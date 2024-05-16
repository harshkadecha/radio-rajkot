<?php

namespace App\Http\Controllers;

use App\Models\ShowSchedule;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin-show.show-list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin-show.show-form');
    }

    public function getData(Request $request)
    {
        $schedules = ShowSchedule::all();

        $data = DataTables::of($schedules)
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'show_name' => 'required|string',
            'rj_name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('show.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();
            // Session::flash('alert-class', 'alert-danger');
            try {

                $schedule = new ShowSchedule;
                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = storage_path() . '/app/public/image/show/';
                    if (!Storage::exists($path)) {
                        Storage::makeDirectory($path);
                    }
                    $storagePath = Storage::disk('local')->put('public/image/show/', $file, 'public');
                    $filename = basename($storagePath);
                    $schedule->show_banner = $filename;
                }

                $schedule->show_name = $request->show_name;
                $schedule->rj_name = $request->rj_name;
                $schedule->rj_follow = $request->rj_follow;
                $schedule->start_time = $request->start_time;
                $schedule->end_time = $request->end_time;
                $schedule->show_description = $request->show_description;
                $saved = $schedule->save();




                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Schedule Data Created Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/show')->with('response', $response);
            } catch (\Exception $e) {

                Log::error($e->getMessage());
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('show.create')->with('response', $response);
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
        $schedule = ShowSchedule::find($id);
        return view('admin.admin-show.show-form', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Session::flash('message', 'Schedule Updated Successfully!');
        $rules = [
            'show_name' => 'required|string',
            'rj_name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('show.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();
            // Session::flash('alert-class', 'alert-danger');
            try {

                //    $schedule = new ShowSchedule;
                $schedule = ShowSchedule::find($id);


                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = storage_path() . '/app/public/image/show/';
                    if (!Storage::exists($path)) {
                        Storage::makeDirectory($path);
                    }
                    $storagePath = Storage::disk('local')->put('public/image/show/', $file, 'public');
                    $filename = basename($storagePath);
                    $schedule->show_banner = $filename;
                }

                $schedule->show_name = $request->show_name;
                $schedule->rj_name = $request->rj_name;
                $schedule->rj_follow = $request->rj_follow;
                $schedule->start_time = $request->start_time;
                $schedule->end_time = $request->end_time;
                $schedule->show_description = $request->show_description;
                $saved = $schedule->save();




                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Schedule Data Updated Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/show')->with('response', $response);
            } catch (\Exception $e) {

                Log::error($e->getMessage());
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('show.create')->with('response', $response);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $schedule = ShowSchedule::find($id);

            if ($schedule) {

                $schedule->delete();
                $response = [
                    'status' => true,
                    'message' => 'Schedule Data Deleted Successfully!',
                    'data' => [],
                ];
            } else {
                $response = [
                    'status' => false,
                    'message' => 'Something went wrong! Please try again.',
                    'data' => [],
                ];
            }
        } catch (\Exception $e) {
            $response = [
                'status' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'data' => [],
            ];
        }

        return response()->json($response);
    }
}
