<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin-comments.comment-list');
    }

    public function getData(Request $request)
    {
        try {

            $comments = Comment::latest()->get();

            $data = DataTables::of($comments)
                ->editColumn('created_at', function ($data) {
                    if ($data->created_at) {
                        $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y');
                        return $formatedDate;
                    } else {
                        return "-";
                    }
                })
                ->editColumn('blog_id', function ($data) {
                    if ($data->blog_id) {
                        $blog = Blog::find($data->blog_id);
                        if ($blog) {
                            $blog_name = $blog->title;
                        } else {
                            $blog_name = '-';
                        }
                        return $blog_name;
                    } else {
                        return "-";
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
            return $data;
        } catch (Exception $e) {

            $response = [
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'data' => [],
            ];

            return $response;
        }
    }

    public function verifyComment(Request $request)
    {
        try {

            $comment = Comment::find($request->id);

            if ($comment) {

                if ($comment->is_verified == 1) {

                    $comment->is_verified = 0;
                    $comment->save();
                } else {
                    $comment->is_verified = 1;
                    $comment->save();
                }

                $response = [
                    'status' => true,
                    'message' => 'Status Updated Successfully..',
                    'data' => [],
                ];

                return $response;
            } else {
                $response = [
                    'status' => false,
                    'message' => 'comment not found..',
                    'data' => [],
                ];

                return $response;
            }
        } catch (Exception $e) {

            \Log::error($e->getMessage());

            $response = [
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'data' => [],
            ];

            return $response;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = Blog::all();
        $arr = array();
        foreach ($blogs as $blog) {
            $arr[$blog->id] = $blog->title;
        }
        return view('admin.admin-comments.comment-form', compact('arr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'blog_id' => 'required|string',
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('comments.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();
            // Session::flash('alert-class', 'alert-danger');
            try {

                $comment = new Comment;
                $comment->name = $request->name;
                $comment->blog_id = $request->blog_id;
                $comment->comment = $request->comment;
                if (isset($request->is_verified)) {
                    $comment->is_verified = 1;
                }
                $saved = $comment->save();

                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Comment Data Created Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/comments')->with('response', $response);
            } catch (\Exception $e) {

                \Log::error($e->getMessage());
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('comments.create')->with('response', $response);
            }
        }
    }

    public function AddComment(Request $request)
    {
        try {

            $comment = new Comment;
                $comment->name = $request->name;
                $comment->blog_id = $request->blog_id;
                $comment->comment = $request->comment;
                $saved = $comment->save();

                if($saved){

                    $response = [
                        'status' => true,
                        'message' => 'Thanks for review...',
                        'data' => [],
                    ];

                    return $response;

                }else{

                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong..',
                        'data' => [],
                    ];

                    return $response;
                }

        } catch (Exception $e) {

            $response = [
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'data' => [],
            ];

            return $response;
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
        $comment = Comment::find($id);
        $blogs = Blog::all();
        $arr = array();
        foreach ($blogs as $blog) {
            $arr[$blog->id] = $blog->title;
        }
        return view('admin.admin-comments.comment-form', compact('arr', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $rules = [
            'blog_id' => 'required|string',
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('comments.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();
            // Session::flash('alert-class', 'alert-danger');
            try {

                $comment = Comment::find($id);
                $comment->name = $request->name;
                $comment->blog_id = $request->blog_id;
                $comment->comment = $request->comment;
                if (isset($request->is_verified)) {
                    $comment->is_verified = 1;
                } else {
                    $comment->is_verified = 0;
                }
                $saved = $comment->save();

                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Comment Data Updated Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/comments')->with('response', $response);
            } catch (\Exception $e) {

                \Log::error($e->getMessage());
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('comments.create')->with('response', $response);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $comment = Comment::find($id);


            if ($comment) {

                $comment->delete();

                $response = [
                    'status' => true,
                    'message' => 'comment removed Successfully....',
                    'data' => [],
                ];
            } else {

                $response = [
                    'status' => false,
                    'message' => 'Comment not found...',
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
