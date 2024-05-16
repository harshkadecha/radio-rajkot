<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function careers(Request $request)
    {
        return view('front.career');
    }
    public function contactUs(Request $request)
    {
        return view('front.contact-us');
    }
    public function aboutUs(Request $request)
    {
        $content = StaticPage::where('name','about_us')->get();
        if($content){
            $content = $content->first();
        }else{
            $content = "";
        }
        return view('front.about-us',compact('content'));
    }
    public function advertise(Request $request)
    {
        $content = StaticPage::where('name','advertise-with-us')->get();
        if($content){
            $content = $content->first();
        }else{
            $content = "";
        }
        return view('front.advertise',compact('content'));
    }
    public function privacyPolicy(Request $request)
    {
        $content = StaticPage::where('name','privay-policy')->get();
        if($content){
            $content = $content->first();
        }else{
            $content = "";
        }
        return view('front.privacy-policy',compact('content'));
    }
    public function termsAndCondition(Request $request)
    {
        $content = StaticPage::where('name','terms-and-condition')->get();
        if($content){
            $content = $content->first();
        }else{
            $content = "";
        }
        return view('front.terms-and-conditions',compact('content'));
    }
    public function mtmf(Request $request)
    {
        $content = StaticPage::where('name','mtmf')->get();
        if($content){
            $content = $content->first();
        }else{
            $content = "";
        }
        return view('front.mtmf',compact('content'));
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
