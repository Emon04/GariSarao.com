<?php


namespace App\Http\Controllers;
use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;


class GariSaraoController extends Controller
{
        public function index()
        {
            $featuredProducts  = Product::skip(1)->take(3)->get();
            $newProducts       = Product::orderBy('id','DESC')->take(4)->get();
            $inspiredProducts  = Product::take(8)->get();
            return view ('front-end.home.home',[
                'featuredProducts' => $featuredProducts,
                'newProducts'      => $newProducts,
                'inspiredProducts' => $inspiredProducts
            ]);
        }
        public function category($id)
        {
            $catProducts = Product::where('cat_id',$id)->get();
            return view ('front-end.category.category',[
                   'catProducts'  => $catProducts,
            ]);
        }
        public function productDetails($id){
             $productDetails = Product::find($id);
             $cat = Category::find($productDetails->cat_id);
             $brand = Brand::find($productDetails->brand_id);
//             dd($brand);
            return view('front-end.product.product-details',[
                'productDetails'  => $productDetails,
                'category'  => $cat,
                'brand'  => $brand,
            ]);
        }
}
