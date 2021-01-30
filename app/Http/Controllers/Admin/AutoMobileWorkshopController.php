<?php

namespace App\Http\Controllers\Admin;

use App\AutomobileWorkShop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AutoMobileWorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = AutomobileWorkShop::all();
        return view('admin.automobile_workshop.list', compact('workshops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd('test');
        return view('admin.automobile_workshop.add-automobile-workshop');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
//            'status'      => 'required',
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
        $automobile_workshop->status = $request->status;
        $automobile_workshop->image = $imageUrl;
        $automobile_workshop->trade_license = $request->trade_license;
        $automobile_workshop->password = bcrypt($request->password);
        $automobile_workshop->save();
        return redirect()->route('automobileWorkshop.index')->with('message','Automobile workshop creation is successful');
    }

    /**
     * Display the specified resource.
     *
     * @param AutomobileWorkShop $automobileWorkShop
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AutomobileWorkShop $automobileWorkShop
     * @return void
     */
    public function edit(AutomobileWorkShop  $automobileWorkShop)
    {
        dd($automobileWorkShop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param AutomobileWorkShop $automobileWorkShop
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'  => 'required',
            'about'  => 'required',
            'address'  => 'required',
            'service_areas'  => 'required',
            'phone'  => 'required',
            'trade_license'  => 'required',
            'image' => 'image',
            'status'      => 'required',
        ]);
        $automobile_workshop = AutomobileWorkShop::findOrFail($id);
        if ($request->hasFile('image')){
            unlink($automobile_workshop->image);
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = $request->name;
            $directory = 'admin/workshop-images/';
            $imageUrl  = $directory.$imageName.'.'.$ext;
            Image::make($image)->resize(400,400)->save($imageUrl);
        }

        $automobile_workshop->name = $request->name;
        $automobile_workshop->about = $request->about;
        $automobile_workshop->address = $request->address;
        $automobile_workshop->service_areas = $request->service_areas;
        $automobile_workshop->phone = $request->phone;
        $automobile_workshop->status = $request->status;
        $automobile_workshop->image = $imageUrl;
        $automobile_workshop->trade_license = $request->trade_license;
        $automobile_workshop->save();
        return redirect()->route('automobileWorkshop.index')->with('message','Automobile workshop successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AutomobileWorkShop $automobileWorkShop
     * @return void
     */
    public function destroy($id)
    {
        $automobile_workshop = AutomobileWorkShop::findOrFail($id);
        unlink($automobile_workshop->image);
        $automobile_workshop->delete();
        return redirect()->route('automobileWorkshop.index')->with('message','Automobile workshop successfully deleted.');

    }
}
