@extends('front-end.master')


@section('body')
    @section('content')
        <div class="col-lg-9 category-home-banner">
            <div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                         <h2 class="text-center">
                             Thank you Mr. <strong class="text-success">{{Session::get('customerName')}}</strong> for your order. Your order is being processed.
                         </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    @endsection
 @endsection
