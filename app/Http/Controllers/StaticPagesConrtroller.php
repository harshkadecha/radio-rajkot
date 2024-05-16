<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class StaticPagesConrtroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.static-pages.index');
    }

    public function getData(Request $request)
    {
        $static_pages = StaticPage::all();

        $data = DataTables::of($static_pages)
            ->editColumn('created_at', function ($data) {
                if ($data->created_at) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y');
                    return $formatedDate;
                } else {
                    return "-";
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.static-pages.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:blogs,title|string|min:3|max:255',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('static-pages.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();

            try {

                $static_page = new StaticPage;
                $static_page->name = $request->name;
                $static_page->description = $request->description;
                $saved = $static_page->save();

                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Static Page Created Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/static-pages')->with('response', $response);
            } catch (\Exception $e) {
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('static-pages.create')->with('response', $response);
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
        $static_page = StaticPage::find($id);
        return view('admin.static-pages.form',compact('static_page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|unique:blogs,title|string|min:3|max:255',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('static-pages.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();

            try {

                $static_page = StaticPage::find($id);
                $static_page->name = $request->name;
                $static_page->description = $request->description;
                $saved = $static_page->save();

                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Static Page Updated Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/static-pages')->with('response', $response);
            } catch (\Exception $e) {
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('static-pages.create')->with('response', $response);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
