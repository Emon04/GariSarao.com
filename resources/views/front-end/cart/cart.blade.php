@extends('front-end.master')


@section('body')
@section('content')
    <!--================Home Banner Area =================-->
    <div class="col-lg-9 category-home-banner">
    <section class="banner_area" >
        <div class="row">
            <div class="col-lg-12">
                <div class="card-header">
                    <h5 class="text-center">
                        Your shopping cart details is in below:
                    </h5>
                </div>
            </div>
        </div>
{{--        <div class="banner_inner d-flex align-items-center">--}}
{{--            <div class="container">--}}
{{--                <div--}}
{{--                    class="banner_content d-md-flex justify-content-between align-items-center"--}}
{{--                >--}}
{{--                    <div class="mb-3 mb-md-0">--}}
{{--                        <h2>Cart</h2>--}}
{{--                        <p>Your selected items.</p>--}}
{{--                    </div>--}}
{{--                    <div class="page_link">--}}
{{--                        <a href="index.html">Home</a>--}}
{{--                        <a href="cart.html">Cart</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        @if($cartProducts->isNotEmpty())
        <section class="cart_area col-lg-12 ">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $sum =0?>
                            @foreach($cartProducts as $cartProduct)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img
                                                    src="{{$cartProduct->options->image}}" width="80"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="media-body">
                                                <p>{{$cartProduct->name}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>TK. {{$cartProduct->price}}</h5>
                                    </td>
                                    <td>
                                        <form  action="{{route('edit-cart')}}" method="post">
                                            @csrf
                                            <div class="product_count">
                                                <input type="number" name="qty"  min="1" value="{{$cartProduct->qty}}" class=""/>
                                                <input type="hidden" name="rowId"  value="{{$cartProduct->rowId}}" />
{{--                                                <button--}}
{{--                                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">--}}
{{--                                                    <i class="lnr lnr-chevron-up"></i>--}}
{{--                                                </button>--}}
{{--                                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button">--}}
{{--                                                    <i class="lnr lnr-chevron-down"></i>--}}
{{--                                                </button>--}}
                                            </div>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <h5>TK. {{$cartProduct->subtotal}}</h5>
                                    </td>
                                    <td>
                                        <a href="{{route('delete-cart',$cartProduct->rowId)}}" class="btn btn-danger"><i class="fa fa-trash text-white"></i></a>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>TK. {{ $subTotalPrice }} </h5>

                                    <?php Session::put('orderTotal', $sum) ?>

                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="checkout_btn_inner">
                                        <a class="gray_btn" href="{{route('/')}}">Continue Shopping</a>
                                        @if(Session::get('customerId') && Session::get('shippingId'))
                                            <a class="main_btn" href="{{route('checkout-payment')}}">Proceed to checkout</a>
                                        @elseif(Session::get('customerId'))
                                            <a class="main_btn" href="{{route('checkout-shopping')}}">Proceed to checkout</a>
                                        @else
                                            <a class="main_btn" href="{{route('checkout')}}">Proceed to checkout</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        @else
            <div class="cart_area col-lg-12 "> <p style="text-align: center; color: #0b0b0b; font-size: 25px"><strong>Your shopping cart is empty</strong></p></div>

        @endif
    </section>
    </div>
    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->

    <!--================End Cart Area =================-->
@endsection
@endsection
