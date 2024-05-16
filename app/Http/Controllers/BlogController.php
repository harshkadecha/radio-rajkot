<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('category', '!=', null)->get();
        // return $blogs;
        return view('admin.admin-blogs.blogs-listing', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = [
            'top_news' => 'Top News',
            'trending_reads' => 'Trending Reads',
            'government_schemas' => 'Government Schemas',
        ];
        return view('admin.admin-blogs.blogs-form', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|unique:blogs,title|string|min:3|max:255',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('admin-blogs.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();

            try {

                $blog = new Blog;
                $path = storage_path() . '/app/public/image/blog/temp/';

                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = storage_path() . '/app/public/blog/';
                    if (!Storage::exists($path)) {
                        Storage::makeDirectory($path);
                    }
                    $storagePath = Storage::disk('local')->put('public/blog/', $file, 'public');
                    $filename = basename($storagePath);
                    $blog->images = $filename;
                }
                $slug = str_slug($request->title, '-');

                $blog->title = $request->title;
                $blog->slug = $slug;
                $description = $request->description;
                $blog->description = $description;
                $blog->category = $request->category;
                $saved = $blog->save();

                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Blog Created Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/blogs')->with('response', $response);
            } catch (\Exception $e) {
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('admin-blogs.create')->with('response', $response);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        $category = [
            'top_news' => 'Top News',
            'trending_reads' => 'Trending Reads',
            'government_schemas' => 'Government Schemas',
        ];
        if ($blog) {
            return view('admin.admin-blogs.blogs-form', compact('blog', 'category'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('admin-blogs.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();

            try {

                $blog = Blog::find($id);

                if ($blog) {

                    if ($request->file('image')) {

                        $oldImage = storage_path() . '/app/public/blog/' . $blog->images;
                        if (file_exists($oldImage)) {
                            unlink($oldImage);
                            Log::info("Old Image: " . $oldImage);
                        }

                        $file = $request->file('image');
                        $path = storage_path() . '/app/public/blog/';
                        if (!Storage::exists($path)) {
                            Storage::makeDirectory($path);
                        }
                        $storagePath = Storage::disk('local')->put('public/blog/', $file, 'public');
                        $filename = basename($storagePath);
                        $blog->images = $filename;
                    }

                    $slug = str_slug($request->title, '-');
                    $blog->title = $request->title;
                    $blog->slug = $slug;
                    $description = $request->description;
                    $blog->description = $description;
                    $blog->category = $request->category;
                    $saved = $blog->save();

                    if ($saved) {
                        $response = [
                            'status' => true,
                            'message' => 'Blog Updated Successfully!',
                            'data' => $saved,
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Something went wrong! Please try again.',
                            'data' => [],
                        ];
                    }
                }

                return redirect('admin/blogs')->with('response', $response);
            } catch (\Exception $e) {
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('admin-blogs.create')->with('response', $response);
            }
        }
    }

    public function frontBlog($id)
    {
        // return $slug;
        try{
            $blog = Blog::where('id',$id)->get();
            if($blog){
                $blog = $blog->first();

                if(is_null($blog)){
                    return view('front.static-pages.404-page');
                }else{

                    $comments = Comment::where('blog_id',$blog->id)->get();
                    $blog_id = $blog->id;

                    return view('front.blog',compact('blog','comments','blog_id'));
                }
            }else{
                return view('front.static-pages.404-page');
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $blog = Blog::find($id);

            if ($blog) {

                if ($blog->images != null) {

                    $oldImage = storage_path() . '/app/public/blog/' . $blog->images;
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                        Log::info("Old Image: " . $oldImage);
                    }
                }
                $blog->delete();

                $response = [
                    'status' => true,
                    'message' => 'Blog removed Successfully....',
                    'data' => [],
                ];

            } else {

                $response = [
                    'status' => false,
                    'message' => 'Blog not found...',
                    'data' => [],
                ];
            }

            return $response;
        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'data' => [],
            ];
        }

        return $response;
    }
}
