@extends('front-end.master')
@section('title')
{{ $productDetails->product_name.' details.' }}
@endsection

@section('body')
    <!--================Home Banner Area =================-->

    <!--================End Home Banner Area =================-->

    <!--================Single Product Area =================-->
@section('content')
{{--    <section class="banner_area col-lg-9">--}}
{{--        <div class="banner_inner d-flex align-items-center">--}}
{{--            <div class="container">--}}
{{--                <div--}}
{{--                    class="banner_content d-md-flex justify-content-between align-items-center"--}}
{{--                >--}}
{{--                    <div class="mb-3 mb-md-0">--}}
{{--                        <h2>Product Details</h2>--}}
{{--                        <p>Very us move be blessed multiply night</p>--}}
{{--                    </div>--}}
{{--                    <div class="page_link">--}}
{{--                        <a href="index.html">Home</a>--}}
{{--                        <a href="single-product.html">Product Details</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <div class="category-home-banner col-lg-9">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_product_img">
                        <div
                            id="carouselExampleIndicators"
                            class="carousel slide"
                            data-ride="carousel"
                        >
                            <ol class="carousel-indicators">
                                @foreach(json_decode($productDetails->image_file) as $img)
                                    <li
                                        data-target="#carouselExampleIndicators"
                                        data-slide-to="0"
                                    >
                                        <img
                                            src="{{asset($img)}} " width="55px"
                                            alt=""
                                        />
                                    </li>

                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img
                                        class="d-block w-100"
                                        src="{{asset($productDetails->main_image)}}"
                                        alt="First slide"
                                    />
                                </div>
                                @foreach(json_decode($productDetails->image_file) as $img)
                                    <div class="carousel-item">
                                        <img
                                            class="d-block w-100"
                                            src="{{asset($img)}}"
                                            alt="Second slide"
                                        />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h1>{{$productDetails->product_name}}</h1>
                        <h2>TK. {{$productDetails->product_price}}</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Category</span> : {{ $category->cat_name}}</a
                                >
                            </li>
                            <li>
                                <a class="active" href="#">
                                    <span>Brand</span> : {{ $brand->brand_name}}</a
                                >
                            </li>
                            <li>
                                <a href="#"> <span>Availibility</span> : In Stock</a>
                            </li>
                        </ul>
                        <p>
                            {{$productDetails->short_desc}}
                        </p>
                        <form action="{{route('add-cart')}}" method="post">
                            @csrf
                            <div class="product_count">
                                <label for="qty">Quantity:</label>
                                <input type="number" name="qty" id="sst" min="1" value="1" class="input-text qty"/>
                                <input type="hidden" name="id" value="{{$productDetails->id}}" />
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count"
                                    type="button"
                                >
                                    <i class="lnr lnr-chevron-up"></i>
                                </button>
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                    class="reduced items-count"
                                    type="button"
                                >
                                    <i class="lnr lnr-chevron-down"></i>
                                </button>
                            </div>
                            <div class="card_area">
                                <button type="submit" name="btn" class="main_btn" >Add to Cart</button>
                                <a class="icon_btn" href="#">
                                    <i class="lnr lnr lnr-diamond"></i>
                                </a>
                                <a class="icon_btn" href="#">
                                    <i class="lnr lnr lnr-heart"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <section class="product_description_area">
            <div class="container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="home-tab"
                            data-toggle="tab"
                            href="#home"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true"
                        >Description</a
                        >
                    </li>

                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            id="review-tab"
                            data-toggle="tab"
                            href="#review"
                            role="tab"
                            aria-controls="review"
                            aria-selected="false"
                        >Reviews</a
                        >
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div
                        class="tab-pane fade"
                        id="home"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                    >
                        <p>
                            {!! $productDetails->long_desc !!}
                        </p>
                    </div>

                    <div
                        class="tab-pane fade show active"
                        id="review"
                        role="tabpanel"
                        aria-labelledby="review-tab"
                    >
                        <div class="row">
                            <div class="col-lg-12">
                                @comments(['model' => $productDetails])
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection

    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->

    <!--================End Product Description Area =================-->
@endsection
