<?php

namespace App\Http\Controllers\Admin;

use App\AutoMobileEngineer;
use App\AutomobileWorkShop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AutomobileEngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $engineers = AutoMobileEngineer::all();
        $workshops = AutomobileWorkShop::orderBy('name')->get();
        return view('admin.automobile_engineer.list', compact('engineers','workshops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd('test');
        $workshops = AutomobileWorkShop::orderBy('name')->get();
//        dd($workshops);
        return view('admin.automobile_engineer.add-automobile-engineer', compact('workshops'));
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
            'full_name'  => 'required',
            'gender'  => 'required',
            'phone'  => 'required',
            'email'  => 'required|email|unique:auto_mobile_engineers',
            'automobile_work_shop_id'  => 'required',
            'password'  => 'required',
            'image' => 'required|image',
            'status'      => 'required',
        ]);

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = $request->name;
        $directory = 'admin/engineer-images/';
        $imageUrl  = $directory.$imageName.'.'.$ext;
        Image::make($image)->resize(400,400)->save($imageUrl);
//        $brandImage->move($directory, $imageName.'.'.$ext);
        $automobileEngineer = new AutoMobileEngineer();
        $automobileEngineer->full_name = $request->full_name;
        $automobileEngineer->gender = $request->gender;
        $automobileEngineer->automobile_work_shop_id = $request->automobile_work_shop_id;
        $automobileEngineer->email = $request->email;
        $automobileEngineer->phone = $request->phone;
        $automobileEngineer->status = $request->status;
        $automobileEngineer->image = $imageUrl;
        $automobileEngineer->password = bcrypt($request->password);
        $automobileEngineer->save();
        return redirect()->route('automobileEngineer.index')->with('message','Automobile engineer creation is successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'full_name'  => 'required',
            'gender'  => 'required',
            'phone'  => 'required',
            'automobile_work_shop_id'  => 'required',
            'image' => 'required|image',
            'status'      => 'required',
        ]);

        $automobileEngineer = AutoMobileEngineer::findOrFail($id);
        if ($request->hasFile('image')){
            unlink($automobileEngineer->image);
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = $request->name;
            $directory = 'admin/engineer-images/';
            $imageUrl  = $directory.$imageName.'.'.$ext;
            Image::make($image)->resize(400,400)->save($imageUrl);
        }

        $automobileEngineer->full_name = $request->full_name;
        $automobileEngineer->gender = $request->gender;
        $automobileEngineer->automobile_work_shop_id = $request->automobile_work_shop_id;
        $automobileEngineer->phone = $request->phone;
        $automobileEngineer->status = $request->status;
        $automobileEngineer->image = $imageUrl;
        $automobileEngineer->save();
        return redirect()->route('automobileEngineer.index')->with('message','Automobile Engineer information updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $automobileEngineer = automobileEngineer::findOrFail($id);
        unlink($automobileEngineer->image);
        $automobileEngineer->delete();
        return redirect()->route('automobileEngineer.index')->with('message','Automobile Engineer successfully deleted.');
    }
}
