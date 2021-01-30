<?php

namespace App\Http\Controllers\workshop;

use App\AutomobileWorkShop;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    //
    use RegistersUsers;
    public function __construct()
    {
        $this->middleware('guest:autoMobileWorkshop');
    }
    public function showRegForm(){
        return view('autoMobileWorkshop.register');
    }
    public function register(Request $request){
        $this->validate($request,[
            'name'  => 'required',
            'about'  => 'required',
            'address'  => 'required',
            'service_areas'  => 'required',
            'email'  => 'required|email|unique:automobile_work_shops',
            'phone'  => 'required',
            'trade_license'  => 'required',
            'password'  => 'required',
            'image' => 'required|image',
        ]);

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = $request->name;
        $directory = 'admin/workshop-images/';
        $imageUrl  = $directory.$imageName.'.'.$ext;
        Image::make($image)->resize(400,400)->save($imageUrl);
//        $brandImage->move($directory, $imageName.'.'.$ext);
        $automobile_workshop = new AutomobileWorkShop();
        $automobile_workshop->name = $request->name;
        $automobile_workshop->about = $request->about;
        $automobile_workshop->address = $request->address;
        $automobile_workshop->service_areas = $request->service_areas;
        $automobile_workshop->email = $request->email;
        $automobile_workshop->phone = $request->phone;
        $automobile_workshop->status = 'pending';
        $automobile_workshop->image = $imageUrl;
        $automobile_workshop->trade_license = $request->trade_license;
        $automobile_workshop->password = bcrypt($request->password);
        $automobile_workshop->save();

    }
}
