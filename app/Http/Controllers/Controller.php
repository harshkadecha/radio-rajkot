<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('admin.dashboard.dashboard');
    }
    function adminEdit()
    {

        // return Auth::user();
        $userData = Auth::user();
        return view('admin.auth.edit', compact('userData'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function adminUpdate(Request $request)
    {

        //return $request;

        $user = Auth::user();
        // $user->email = $request->email;
        // $user->name = $request->name;
        $user->password = Hash::make($request->pass);
        $user->save();
        $userData = Auth::user();
        $response = [
            'status' => true,
            'message' => 'Password changed Successfully',
            'data' => [$request->pass],
        ];
        return $response;
    }

    function resetpassword1(Request $request)
    {

        $pass = $request->pass;
        if (!(Hash::check($request->pass, Auth::user()->password))) {
            $response = [
                'status' => false,
                'message' => 'Error: Password not match',
                'data' => [$request->pass],
            ];
            return $response;
        } else {
            $response = [
                'status' => true,
                'message' => 'Password matched',
                'data' => []
            ];
            return $response;
        }
    }
    public function adminHomePage()
    {
        return  view('admin.home-page.home-page');
    }
}
