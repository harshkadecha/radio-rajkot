<?php

namespace App\Http\Controllers;

use App\Models\AdsControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.admin-ads-manage.index');
    }

    public function getData(Request $request)
    {
        $ads = AdsControl::all();

        $data = DataTables::of($ads)
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
        $type = array();
        $type['1st_advertise'] = "1st Advertise";
        $type['2nd_advertise'] = "2nd Advertise";
        return view('admin.admin-ads-manage.form', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'type' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('ad-manage.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();
            // Session::flash('alert-class', 'alert-danger');
            try {

                $ads = new AdsControl;

                if ($request->file('image')) {
                    $file = $request->file('image');
                    $path = storage_path() . '/app/public/image/advertise/';
                    if (!Storage::exists($path)) {
                        Storage::makeDirectory($path);
                    }
                    $storagePath = Storage::disk('local')->put('public/image/advertise/', $file, 'public');
                    $filename = basename($storagePath);
                    $ads->image = $filename;
                }

                $ads->type = $request->type;
                $ads->active_status = $request->active_status;
                $saved = $ads->save();

                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Ads Data Created Successfully!',
                        'data' => $saved,
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something went wrong! Please try again.',
                        'data' => [],
                    ];
                }

                return redirect('admin/ad-manage')->with('response', $response);
            } catch (\Exception $e) {

                Log::error($e->getMessage());
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('ad-manage.index')->with('response', $response);
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
        $advertise = AdsControl::find($id);
        $type = array();
        $type['1st_advertise'] = "1st Advertise";
        $type['2nd_advertise'] = "2nd Advertise";
        return view('admin.admin-ads-manage.form', compact('advertise', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'type' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('ad-manage.create')
                ->withInput()
                ->withErrors($validator);
        } else {

            $data = $request->all();
            // Session::flash('alert-class', 'alert-danger');
            try {

                $ads = AdsControl::find($id);

                if ($ads) {

                    if ($request->file('image')) {
                        $file = $request->file('image');
                        $path = storage_path() . '/app/public/image/advertise/';
                        if (!Storage::exists($path)) {
                            Storage::makeDirectory($path);
                        }
                        $storagePath = Storage::disk('local')->put('public/image/advertise/', $file, 'public');
                        $filename = basename($storagePath);
                        $ads->image = $filename;
                    }

                    $ads->type = $request->type;
                    $ads->active_status = $request->active_status;
                    $saved = $ads->save();

                    if ($saved) {
                        $response = [
                            'status' => true,
                            'message' => 'Ads Data Created Successfully!',
                            'data' => $saved,
                        ];
                    } else {
                        $response = [
                            'status' => false,
                            'message' => 'Something went wrong! Please try again.',
                            'data' => [],
                        ];
                    }

                    return redirect('admin/ad-manage')->with('response', $response);

                } else {

                    $response = [
                        'status' => false,
                        'message' => 'Ad not found....',
                        'data' => [],
                    ];
                    return redirect()->route('ad-manage.create')->with('response', $response);

                }
            } catch (\Exception $e) {

                Log::error($e->getMessage());
                $response = [
                    'status' => false,
                    'message' => 'Error: ' . $e->getMessage(),
                    'data' => [],
                ];
                return redirect()->route('ad-manage.index')->with('response', $response);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $ads = AdsControl::find($id);

            if ($ads) {

                $ads->delete();
                $response = [
                    'status' => true,
                    'message' => 'Ads Data Deleted Successfully!',
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
