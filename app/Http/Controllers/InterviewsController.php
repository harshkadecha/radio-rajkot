<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class InterviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin-interviews.interviews-listing');
    }

    public function getData(Request $request)
    {
        $interviews = Interview::all();

        $data = DataTables::of($interviews)
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
        return view('admin.admin-interviews.interviews-form');
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
                ->route('interviews.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();

            try {

                $interview = new Interview;

                $interview->name = $request->name;
                $interview->description = $request->description;
                // if (isset($data['file'])) {
                //     $video = $data['file'];
                //     $str = "/public/uploads" . "/";
                //     $path = storage_path() . '/app/public/uploads' . '/';
                //     if (!Storage::exists($path)) {
                //         File::makeDirectory($path, $mode = 0777, true, true);
                //     }
                //     $tests = Storage::disk('local')->put($str, $video, 'public');
                //     $fileName =  asset('storage/uploads/') . "/" . basename($tests);
                //     $interview->file_path = $fileName;
                // }
                // if (isset($data['cover_image'])) {
                //     $video = $data['cover_image'];
                //     $str = "/public/uploads" . "/";
                //     $path = storage_path() . '/app/public/uploads' . '/';
                //     if (!Storage::exists($path)) {
                //         File::makeDirectory($path, $mode = 0777, true, true);
                //     }
                //     $tests = Storage::disk('local')->put($str, $video, 'public');
                //     $fileName =  asset('storage/uploads/') . "/" . basename($tests);
                //     $interview->cover_image = $fileName;
                // }
                $saved = $interview->save();
                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Interview Created Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/interviews')->with('response', $response);
            } catch (\Exception $e) {
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('interviews.create')->with('response', $response);
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
        $interview = Interview::find($id);
        return view('admin.admin-interviews.interviews-form', compact('interview'));
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
                ->route('interviews.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();

            try {

                $interview = Interview::find($id);

                if ($interview) {


                    $interview->name = $request->name;
                    $interview->description = $request->description;

                    // if (isset($data['file'])) {
                    //     $video = $data['file'];
                    //     $str = "/public/uploads" . "/";
                    //     $path = storage_path() . '/app/public/uploads' . '/';
                    //     if (!Storage::exists($path)) {
                    //         File::makeDirectory($path, $mode = 0777, true, true);
                    //     }
                    //     $tests = Storage::disk('local')->put($str, $video, 'public');
                    //     $fileName =  asset('storage/uploads/') . "/" . basename($tests);
                    //     $interview->file_path = $fileName;
                    // }

                    // if (isset($data['cover_image'])) {
                    //     $video = $data['cover_image'];
                    //     $str = "/public/uploads" . "/";
                    //     $path = storage_path() . '/app/public/uploads' . '/';
                    //     if (!Storage::exists($path)) {
                    //         File::makeDirectory($path, $mode = 0777, true, true);
                    //     }
                    //     $tests = Storage::disk('local')->put($str, $video, 'public');
                    //     $fileName =  asset('storage/uploads/') . "/" . basename($tests);
                    //     $interview->cover_image = $fileName;
                    // }


                    $saved = $interview->save();

                    if ($saved) {
                        $response = [
                            'status' => true,
                            'message' => 'Interview Updated Successfully!',
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

                return redirect('admin/interviews')->with('response', $response);
            } catch (\Exception $e) {
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('interviews.create')->with('response', $response);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $interview = Interview::find($id);

            if ($interview) {

                $interview->delete();

                $response = [
                    'status' => true,
                    'message' => 'Interview removed Successfully....',
                    'data' => [],
                ];
            } else {

                $response = [
                    'status' => false,
                    'message' => 'Interview not found...',
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
