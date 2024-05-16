<?php

namespace App\Http\Controllers;

use App\Models\Rj;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RjInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.rj-info.rj-info-list');
    }
    public function getData(Request $request)
    {
        // $blogs = Blog::all();
        $rj_info = Rj::all();

        $data = DataTables::of($rj_info)
            ->editColumn('created_at', function ($data) {
                if ($data->created_at) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d-m-Y');
                    return $formatedDate;
                } else {
                    return "-";
                }
            })
            ->editColumn('updated_at', function ($data) {
                if ($data->updated_at) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at)->format('d-m-Y');
                    return $formatedDate;
                } else {
                    return "-";
                }
            })
            ->make(true);

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
