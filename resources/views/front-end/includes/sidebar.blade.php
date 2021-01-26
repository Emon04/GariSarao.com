{{--<section class="home_banner_area mb-40">--}}
{{--    <div class="banner_inner d-flex align-items-center">--}}
{{--        <div class="container">--}}
{{--            <div class="banner_content row">--}}
{{--                <div class="col-lg-3">--}}
{{--                    <div class="left_sidebar_area">--}}
{{--                        <aside class="left_widgets p_filter_widgets">--}}
{{--                            <div class="l_w_title">--}}
{{--                                <h1><span>Categories</span></h1>--}}
{{--                            </div>--}}
{{--                            <div class="widgets_inner">--}}
{{--                                <ul class="list">--}}
{{--                                    @foreach($categories as $category)--}}
{{--                                        <li>--}}
{{--                                            <a href="{{route('category', ['id'=>$category->id , 'name'=>$category->cat_name])}}">{{$category->cat_name}}</a>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}

{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </aside>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @yield('content')--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h1><span>Categories</span></h1>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{route('category', ['id'=>$category->id , 'name'=>$category->cat_name])}}">{{$category->cat_name}}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                @yield('content')

            </div>
        </div>
    </div>
</section>
