@extends('front-end.master')
@section('body')
    @section('content')
        <div class="col-lg-9 category-home-banner">
            <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <h5 class="text-center">
                   Dear,  <strong class="text-success">{{Session::get('customerName')}}</strong> You have to give us product payment method...
               </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-2">
                <form action="{{route('new-order')}}" method="post">
                    @csrf
                    <div class="card mb-5">
                        <div class="card-header bg-success">
                            <h1 class="text-center">Payment</h1>
                        </div>
                        <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Cash on Delivery</th>
                                        <td><input checked type="radio" name="payment_type" value="Cash">Cash on Delivery</td>
                                    </tr>
                                    <tr>
                                        <th>Pay Now online (Bkash, Rocket, Internet Banking or Visa card)</th>
                                        <td><input type="radio" name="payment_type" value="Online">Pay Now</td>
                                    </tr>
                                </table>
                            <hr>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btn" class="btn btn-success btn-block">Confirm Order</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    @endsection
@endsection
