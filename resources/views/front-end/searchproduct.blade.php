@extends('front-end.master')


@section('title')
{{ $query }}
@endsection

@section('body')

    <!--================Category Product Area =================-->
{{--    <section class="cat_product_area section_gap">--}}
{{--        <div class="container">--}}
{{--            <div class="row flex-row-reverse">--}}
                @section('content')
                <div class="col-lg-9 category-home-banner">
                    <div class="product_top_bar">
                        
                    </div>

                    <div class="latest_product_inner">
                        <div class="row">
                            @foreach($products as $products)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img
                                                class="card-img"
                                                src="{{asset($products->main_image)}}"
                                                alt=""
                                        />
                                        <div class="p_icon">
                                            <a href="#">
                                                <i class="ti-eye"></i>
                                            </a>
                                            <a href="#">
                                                <i class="ti-heart"></i>
                                            </a>
                                            <a href="#">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="{{route('product-details',['id'=>$products->id])}}" class="d-block">
                                            <h4>{{$products->product_name}}</h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4">{{$products->product_price}}</span>
                                            <del>$35.00</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endforeach
                        </div>
                    </div>
                </div>
                @endsection
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--================End Category Product Area =================-->
@endsection
