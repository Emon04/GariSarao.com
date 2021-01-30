<?php

namespace App\Http\Controllers\workshop;

use App\AutomobileService;
use App\AutomobileWorkShop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AutomobileServiceController extends Controller
{
    public function index()
    {
        $usr = auth()->user()->id;
        $services = AutomobileService::where('automobile_work_shop_id','=',$usr)->get();
        $workshops = AutomobileWorkShop::orderBy('name')->get();
        return view('autoMobileWorkshop.automobile_service.list', compact('services','workshops'));
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
        return view('autoMobileWorkshop.automobile_service.add-automobile-service', compact('workshops'));
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
            'service_name'  => 'required',
            'description'  => 'required',
            'image' => 'required|image',
            'status'      => 'required',
        ]);
        $usr = auth()->user();
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = $request->service_name;
        $directory = 'admin/service-images/';
        $imageUrl  = $directory.$usr->name.$imageName.'.'.$ext;

        Image::make($image)->resize(400,400)->save($imageUrl);
//        $brandImage->move($directory, $imageName.'.'.$ext);
        $automobileService = new AutomobileService();
        $automobileService->service_name = $request->service_name;
        $automobileService->description = $request->description;
        $automobileService->automobile_work_shop_id = auth()->user()->id ;
        $automobileService->status = $request->status;
        $automobileService->image = $imageUrl;
        $automobileService->save();
        return redirect()->route('autoMobileWorkshop.automobileService.list')->with('message','Automobile Service creation is successful');

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
            'service_name'  => 'required',
            'description'  => 'required',
            'status'      => 'required',
        ]);

        $usr = auth()->user();
        $automobileService = AutomobileService::findOrFail($id);
        if ($request->hasFile('image')){
            unlink($automobileService->image);
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = $request->service_name;
            $directory = 'admin/service-images/';
            $imageUrl  = $directory.$usr->name.$imageName.'.'.$ext;
            Image::make($image)->resize(400,400)->save($imageUrl);
            $automobileService->image = $imageUrl;
        }

        $automobileService->service_name = $request->service_name;
        $automobileService->description = $request->description;
        $automobileService->status = $request->status;
//        $automobileService->image = $imageUrl;
        $automobileService->save();
        return redirect()->route('autoMobileWorkshop.automobileService.list')->with('message','Automobile Service information updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd('dfsdfsdf');
        $automobileService = AutomobileService::findOrFail($id);
        unlink($automobileService->image);
        $automobileService->delete();
        return redirect()->route('autoMobileWorkshop.automobileService.list')->with('message','Automobile Service successfully deleted.');
    }
}
