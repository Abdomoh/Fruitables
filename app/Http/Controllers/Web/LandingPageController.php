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

        $query = Product::with('category');

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'LIKE', '%' . $request->search . '%')->orWhereHas('category', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            });

        }
        $products = $query->paginate(8);

        $latestProduct = Product::with('category')->latest()->orderBy('created_at', 'desc')->paginate(8); /// 8 latest products
        $bestsellerProducts = Product::withCount('orderProducts as total_sold')->take(10)->orderByDesc('total_sold')->get(); /// /// 10 top best seller products
        return view('index', compact('products', 'latestProduct', 'bestsellerProducts'));
    }
}
