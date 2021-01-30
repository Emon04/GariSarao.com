@extends('layouts.customer.getServiceHome')
@section('content')
    <section class="top-category-widget-area pt-90 pb-90 ">
        <div class="container">
            <h3>Your Search Results</h3>
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4">
                    <div class="single-cat-widget">
                        <div class="content relative">
                            <div class="overlay overlay-bg"></div>
                            <a href="#" target="_blank">
                                <div class="thumb">
                                    <img class="content-image img-fluid d-block mx-auto" src="{{ asset($service->image) }}" alt="">
                                </div>
                                <div class="content-details">
                                    <h4 class="content-title mx-auto text-uppercase">{{ $service->service_name }}</h4>
                                    <span></span>
                                    <p>{{ $service->workshop->name }}</p>
                                    <p><a class="btn btn-warning" href="{{ route('requestService',$service->id) }}"> Book Now</a> </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
