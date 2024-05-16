<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::first();
        // dd($settings->advertisement);

        return view('admin.settings.index',compact('settings'));
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
        try {

            $settings = Setting::find(1);
            if ($settings) {
                $settings->home_page_text = $request->home_page_text;
                $saved = $settings->save();
                if ($saved) {
                    $response = [
                        'status' => true,
                        'message' => 'Settings Changed Suceesfully..',
                        'data' => []
                    ];
                } else {
                    $response = [
                        'status' => false,
                        'message' => 'Something want wrong...',
                        'data' => []
                    ];
                }
            } else {
                $settings = new Setting;
                $settings->home_page_text = $request->home_page_text;
                $settings->save();

                $response = [
                    'status' => true,
                    'message' => 'Settings Changed Suceesfully..',
                    'data' => []
                ];
            }

            return redirect()->route('settings.index')->with('response', $response);
        } catch (Exception $e) {

            $response = [
                'status' => false,
                'message' => 'Error :' . $e->getMessage(),
                'data' => []
            ];

            return redirect()->route('settings.index')->with('response', $response);
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
