@extends('layouts.customer.getServiceHome')
@section('content')
    <section class="contact-page-area section-gap">
        <div class="container">
            <h1>Please insert all information to book the service.</h1>
            <div class="row">
                <div class="col-lg-4 d-flex flex-column address-wrap">
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-store"></span>
                        </div>
                        <div class="contact-details">
                            <h5>Service name</h5>
                            <p>
                                {{ $service->service_name }}
                            </p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-home"></span>
                        </div>
                        <div class="contact-details">
                            <h5>Workshop Name</h5>
                            <p>{{ $service->workshop->name }}</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-12">
                    <form  class="form-area text-right"  action="{{ route('requestServiceSave') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <input type="hidden" name="service_id" value="{{ $service->id }}" id="">
                                <input type="hidden" name="workshop_id" value="{{ $service->automobile_work_shop_id }}" id="">
                                <input  name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

                                <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
                                <input name="phone" placeholder="Enter phone number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone'" class="common-input mb-20 form-control" required="" type="text">

                                <input name="address" placeholder="Enter your address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your address" class="common-input mb-20 form-control" required="" type="text">
                            </div>
                            <div class="col-lg-12 form-group">
                                <textarea class="common-textarea form-control" name="message" placeholder="Enter message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" ></textarea>
                            </div>
                            <div class="col-lg-12">
                                <div class="alert-msg" style="text-align: left;"></div>
                                <input type="submit" value="Book Now"  class="genric-btn primary" style="float: right;">
{{--                                <button class="genric-btn primary" style="float: right;">Send Message</button>--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
