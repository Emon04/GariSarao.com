<?php

namespace App\Http\Controllers\SuperAdmin;
use App\AutoMobileEngineer;
use App\SuperAdmin;
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
        return view('superAdmin.register');
    }
    public function register(Request $request){

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

        $addSuperAdmin=new SuperAdmin();




        $addSuperAdmin->name=$request->input('name');
        $addSuperAdmin->email=$request->input('email');
        $addSuperAdmin->password=bcrypt($request->input('password'));





        $addSuperAdmin->save();
        return redirect('superAdmin/login');

    }
}
