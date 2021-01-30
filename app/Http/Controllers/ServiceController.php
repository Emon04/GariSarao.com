<?php

namespace App\Http\Controllers;

use App\AutomobileService;
use App\AutomobileWorkShop;
use App\RequestBook;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getServiceHome(){
        $workshops=AutomobileWorkShop::orderBy('name')->get();
        return view('customer.getServiceHome',compact('workshops'));
    }

    public function allService(){
            $services = AutomobileService::with('workshop')->get();
//            dd($services);
            return view('customer.allService',compact('services'));
    }
    public function searchService(Request $request){
        $l = $request->area;
        $services = AutomobileService::with(['workshop' =>function($q)use ($l){
            return $q->where('service_areas','like','%'.$l.'%')->get();
        }])->where('service_name','like','%'.$request->service.'%')->get();
        return view('customer.searchService',compact('services'));
    }

    public function request($id){
        $service = AutomobileService::with('workshop')->where('id','=',$id)->first();
        return view('customer.bookingRequest', compact('service'));
    }

    public function saveRequest(Request  $request){
        $r = new RequestBook();
        $r->service_id = $request->service_id;
        $r->workshop_id =$request->workshop_id ;
        $r->customer_name = $request->name;
        $r->email = $request->email;
        $r->phone = $request->phone;
        $r->address =$request->address ;
        $r->message = $request->message;
        $r->save();
        return view('customer.message');
    }
}
