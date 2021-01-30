<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

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
    protected $redirectTo = '/ecommerce';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('front-end.customer.customer-login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email_address'=>'required|string',
            'password'=>'required|string',
        ]);

        $credentials=[
            'email_address'=>$request->email_address,
            'password'=>$request->password,
        ];
//         dd($credentials);
        if(Auth::guard('customer')->attempt($credentials,$request->remember)){
            dd(auth()->user());
            $customer = Customer::where('email_address' ,$request->email_address)->first();
            Session::put('customer',$customer);
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);
            return redirect()->intended('/ecommerce');
        }
        return redirect()->back()->withInput($request->only('email,remember'));
    }
    public function logout(Request $request){
        Auth::guard('customer')->logout();
        return redirect('/customer/login');
    }
}
