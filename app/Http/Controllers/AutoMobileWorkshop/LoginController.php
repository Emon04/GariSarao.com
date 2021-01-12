<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/adminHome';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:superAdmin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('superAdmin.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required|string',
            'password'=>'required|string',
        ]);

        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        // dd($credentials);
        if(Auth::guard('superAdmin')->attempt($credentials,$request->remember)){
            return redirect()->intended(route('superAdmin.home'));
        }
        return redirect()->back()->withInput($request->only('email,remember'));
    }
    public function logout(Request $request){
        Auth::guard('superAdmin')->logout();
        return redirect('/superAdmin/login');
    }
}
