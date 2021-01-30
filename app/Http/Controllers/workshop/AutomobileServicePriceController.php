<?php

namespace App\Http\Controllers\workshop;

use App\AutoMobileEngineer;
use App\AutomobileService;
use App\Http\Controllers\Controller;
use App\RequestBook;
use App\ServicePrice;
use Illuminate\Http\Request;

class AutomobileServicePriceController extends Controller
{
    public function index()
    {
        $usr = auth()->user()->id;
        $servicesp = ServicePrice::where('automobile_work_shop_id','=',$usr)->get();
        $engineers = AutoMobileEngineer::where('automobile_work_shop_id','=',$usr)->get();
        $services = AutomobileService::where('automobile_work_shop_id','=',$usr)->get();
        return view('autoMobileWorkshop.automobile_service_price.list', compact('services','engineers','servicesp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usr = auth()->user()->id;
        $engineers = AutoMobileEngineer::where('automobile_work_shop_id','=',$usr)->get();
        $services = AutomobileService::where('automobile_work_shop_id','=',$usr)->get();
//        dd($workshops);
        return view('autoMobileWorkshop.automobile_service_price.add-automobile-service', compact('engineers','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'automobile_service_id'  => 'required',
            'automobile_engineer_id'  => 'required',
            'description'  => 'required',
            'price' => 'required|numeric',
            'status'      => 'required',
        ]);

        $automobileServicePricePrice = new ServicePrice();
        $automobileServicePricePrice->automobile_service_id = $request->automobile_service_id;
        $automobileServicePricePrice->automobile_engineer_id = $request->automobile_engineer_id;
        $automobileServicePricePrice->description = $request->description;
        $automobileServicePricePrice->price = $request->price;
        $automobileServicePricePrice->automobile_work_shop_id = auth()->user()->id ;
        $automobileServicePricePrice->status = $request->status;
        $automobileServicePricePrice->save();
        return redirect()->route('autoMobileWorkshop.automobileServicePrice.list')->with('message','Automobile Service information creation is successful');

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
//        dd($request->all());
        $this->validate($request,[
            'automobile_service_id'  => 'required',
            'automobile_engineer_id'  => 'required',
            'description'  => 'required',
            'price' => 'required|numeric',
            'status'      => 'required',
        ]);

        $automobileServicePricePrice = ServicePrice::findOrFail($id);
        $automobileServicePricePrice->automobile_service_id = $request->automobile_service_id;
        $automobileServicePricePrice->automobile_engineer_id = $request->automobile_engineer_id;
        $automobileServicePricePrice->description = $request->description;
        $automobileServicePricePrice->price = $request->price;
        $automobileServicePricePrice->automobile_work_shop_id = auth()->user()->id ;
        $automobileServicePricePrice->status = $request->status;
        $automobileServicePricePrice->save();
        return redirect()->route('autoMobileWorkshop.automobileServicePrice.list')->with('message','Automobile Service information updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $automobileServicePricePrice = ServicePrice::findOrFail($id);
        $automobileServicePricePrice->delete();
        return redirect()->route('autoMobileWorkshop.automobileServicePrice.list')->with('message','Automobile Service information successfully deleted.');
    }

    public function requests(){
        $u = auth()->user()->id;
            $requests = RequestBook::with(['service', 'workshop'])->where('workshop_id','=',$u)->get();
//            dd($requests);
            return view('autoMobileWorkshop.requestslist',compact('requests'));
    }
}
