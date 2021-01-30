<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $query = $request-> input('query');
        $products = Product::where('product_name', 'LIKE', "%$query%")->get();
        return view('front-end.searchproduct', compact('products', 'query'));
    }
}
