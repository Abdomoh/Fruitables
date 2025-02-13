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

        $products = Product::with('category')->paginate(8);
        $latestProduct = Product::with('category')->latest()->orderBy('created_at', 'desc')->paginate(8); /// 8 latest products
        $bestsellerProducts = Product::withCount('orderProducts as total_sold')->take(10)->orderByDesc('total_sold')->get(); /// /// 10 top best seller products
        return view('index', compact('products', 'latestProduct','bestsellerProducts'));
    }
}
