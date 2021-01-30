<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Customer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function showRegForm()
    {
        return view('customer.register');
    }
    public function register(Request $request){

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        $addCustomer=new Customer();




        $addCustomer->name=$request->input('name');
        $addCustomer->email=$request->input('email');
        $addCustomer->password=bcrypt($request->input('password'));





        $addCustomer->save();
        return redirect('customer/login');

    }
}
