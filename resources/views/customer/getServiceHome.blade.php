@extends('layouts.customer.getServiceHome')
@section('content')
    <section class="banner-area relative" id="home">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-between">
                <div class="banner-content col-lg-6 col-md-6 ">
                    <h6 class="text-white ">GariSarao.Com</h6>
                    <h1 class="text-uppercase">
                        Need a service? just request your service
                    </h1>
                    <p class="pt-10 pb-10 text-white">

                    </p>
                    <a href="{{ route('getService.allService') }}" class="primary-btn text-uppercase">Services</a>
                </div>
                <div class="col-lg-4  col-md-6 header-right">
                    <h4 class="pb-30">Search Your Desired Service!</h4>
                    <form method="get" action="{{ route('getService.searchService') }}" class="form">
                        <div class="from-group">
                            <input required class="form-control txt-field" type="text" name="service" placeholder="Body Repair "  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Body Repair'">
                            <input required class="form-control txt-field" type="text" name="area" placeholder="Your location. eg. dhanmondi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your location. eg. dhanmondi'">
                        </div>

                        <div class="form-group">

                            <button type="submit" class="btn btn-default btn-lg btn-block text-center text-uppercase">Search service</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 about-left">
                <img class="img-fluid" src="{{asset('customer/img/about-img.jpg')}}" alt="">
            </div>
            <div class="col-lg-6 about-right">
                <h1>GariSarao.com! Purchase Spare Parts!</h1>
                <h4>Best online parts shop in bangladesh</h4>
                <p>
                </p>
                <a target="_blank" class="text-uppercase primary-btn" href="{{ route('/') }}">Buy Now</a>
            </div>
        </div>
    </div>
    <section class="services-area pb-120">
        <div class="container">
            <div class="row section-title">
                <br><br>
                <h1>Registered Automobile Workshops</h1>
            </div>
            <div class="row">
                @foreach($workshops as $work)
                    <div class="col-lg-4 single-service" >
                        <span class="lnr lnr-car"></span>
                        <a href="{{ route('getService.workshopService',$work->id) }}"><h4>{{ $work->name }}</h4></a>
                        <p>
                            {{ $work->about }}
                        </p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End services Area -->
    <!-- Start latest-blog Area -->

@endsection
