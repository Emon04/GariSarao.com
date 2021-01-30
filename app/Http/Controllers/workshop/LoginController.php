<?php

namespace App\Http\Controllers\workshop;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:autoMobileWorkshop')->except('logout');
    }

    public function showLoginForm()
    {
        return view('autoMobileWorkshop.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|string',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('autoMobileWorkshop')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('/autoMobileWorkshop/dashboard');
        }

        return $this->sendFailedLoginResponse($request);
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request){
        Auth::guard('autoMobileWorkshop')->logout();
        return redirect('/autoMobileWorkshop/login');
    }
}
