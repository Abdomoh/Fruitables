<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::with('category')->latest()->paginate(8);
        $latestProduct=Product::with('category')->latest()->orderBy('created_at','desc')->paginate(8);
        return view('index',compact('products','latestProduct'));
    }
}
