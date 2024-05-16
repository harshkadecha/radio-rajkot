<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin-podcasts.podcasts-listing');
    }

    public function getData(Request $request)
    {
        $podcasts = Podcast::all();

        $data = DataTables::of($podcasts)
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
        return view('admin.admin-podcasts.podcasts-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:podcasts,name|string|min:3|max:255',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('podcasts.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();

            try {

                $podcast = new Podcast;

                $podcast->name = $request->name;
                $podcast->description = $request->description;
                $saved = $podcast->save();

                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'podcast Created Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/podcasts')->with('response', $response);
            } catch (\Exception $e) {
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('podcasts.create')->with('response', $response);
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
        $podcast = Podcast::find($id);
        return view('admin.admin-podcasts.podcasts-form',compact('podcast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('podcasts.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();

            try {

                $podcast = Podcast::find($id);

                if ($podcast) {


                    $podcast->name = $request->name;
                    $podcast->description = $request->description;
                    $saved = $podcast->save();

                    if ($saved) {
                        $response = [
                            'status' => true,
                            'message' => 'Podcast Updated Successfully!',
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

                return redirect('admin/podcasts')->with('response', $response);
            } catch (\Exception $e) {
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('podcasts.create')->with('response', $response);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $podcast = Podcast::find($id);

            if ($podcast) {

                $podcast->delete();

                $response = [
                    'status' => true,
                    'message' => 'Podcast removed Successfully....',
                    'data' => [],
                ];

            } else {

                $response = [
                    'status' => false,
                    'message' => 'Podcast not found...',
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
