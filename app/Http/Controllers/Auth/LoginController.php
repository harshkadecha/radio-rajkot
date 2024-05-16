<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');


        // if (Auth::user()->hasRole('user')) {
        //     return 'test';
        // }

        // $user = User::all()->where('id', '=', Auth::user()->id)->first();

        // if ($user->hasRole('user')) {
        //     return view('front.static-pages.404-page');
        //     return 'Unauthorized Action';
        // }

        // if(Auth::user()){
        //     $user = User::all()->where('id', '=', Auth::user()->id)->first();
        //     if ($user->hasRole('user')) {
        //         return view('front.static-pages.404-page');

        //         return 'Unauthorized Action';
        //     }
        // }




    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    protected function authenticated(Request $request, $user)
    {
        $user_id = $user->id;
        $user = User::all()->where('id', '=', $user_id)->first();
        if ($user->hasRole('user')) {
            Auth::logout();
            $response = [
                'status' => false,
                'message' => 'Error: You have not permission for these Action',
                'data' => [],
            ];

            return back()->with('error', 'Sorry our creditaintial do not match')->withInput();
        }
        return redirect()->to('admin/dashboard');
    }


}
