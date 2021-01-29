@extends('front-end.master')

@section('title')
Home
@endsection

@section('body')

    <!-- Start feature Area -->
    @section('content')
        <div class="col-lg-9 left-home-banner">
            <p class="sub text-uppercase">Welcome to</p>
            <h3><span>Garisarao's</span> Motor <br />Parts <span>Shop</span></h3>
            <h4>Biggest Online Motor Parts Shop of Bangladesh </h4>
{{--            <a class="main_btn mt-40" href="#">View Collection</a>--}}
        </div>
    @endsection

    <!--================ Feature Product Area =================-->
    <section class="feature_product_area section_gap_bottom_custom" style="background-color: #e6d7be">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Featured product</span></h2>
                        <p>Bring all latest branded motor spare parts!</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($featuredProducts as $featuredProduct)
                <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{route('product-details',['id'=>$featuredProduct->id])}}"><img class="img-fluid w-100" src="{{asset($featuredProduct->main_image)}}" alt=" " /></a>
                            <div class="p_icon">
                                <a href="{{route('product-details',['id'=>$featuredProduct->id])}}">
                                    <i class="ti-eye"></i>
                                </a>
                                <a href="#">
                                    <i class="ti-heart"></i>
                                </a>
                                <a href="#">
{{--                                    <i class="ti-shopping-cart"></i>--}}
                                    <form action="{{route('add-cart')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="qty" id="sst" min="1" value="1" class="input-text qty"/>
                                        <input type="hidden" name="id" value="{{$featuredProduct->id}}" />
{{--                                        <input type="submit" class="ti-shopping-cart" value="">--}}
                                        <button type="submit" class="btn  px-2"><i class="ti-shopping-cart" aria-hidden="true"></i></button>
{{--                                        <button type="submit" name="btn" ><i class="ti-shopping-cart"></i></button>--}}
                                    </form>
                                </a>
                            </div>
                        </div>
                        <div class="product-btm">
                            <a href="#" class="d-block">
                                <h4>{{$featuredProduct->product_name}}</h4>
                            </a>
                            <div class="mt-3">
                                <span class="mr-4">TK.{{$featuredProduct->product_price}}</span>
                                <del>$35.00</del>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Feature Product Area =================-->


    <!--================ New Product Area =================-->
    <section class="new_product_area section_gap_top section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>new products</span></h2>
                        <p>Bring called seed first of third give itself now ment</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="new_product">
                        <h5 class="text-uppercase">Latest Collection</h5>
                        <h3 class="text-uppercase">{{$newProducts[0]->product_name}}</h3>
                        <div class="product-img">
                            <img class="img-fluid" src="{{asset($newProducts[0]->main_image)}}" alt="" />
                        </div>
                        <h4>{{ $newProducts[0]->product_price }}</h4>
                        <a href="#" class="main_btn">Add to cart</a>
                    </div>
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="row">
                        @foreach ($newProducts as $newProduct)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-product">
                                <div class="product-img">
                                    <img class="img-fluid w-100" src="{{asset($newProduct->main_image)}}" alt=" "/>
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
                                    <a href="#" class="d-block">
                                        <h4>{{$newProduct->product_name}}</h4>
                                    </a>
                                    <div class="mt-3">
                                        <span class="mr-4">TK.{{$newProduct->product_price}}</span>
                                        <del>$35.00</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End New Product Area =================-->


    <!--================ End Blog Area =================-->

@endsection
