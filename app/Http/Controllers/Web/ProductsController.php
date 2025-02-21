<?php
namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductsController extends Controller
{
    public function productDetels($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::withCount('products')->paginate(6);
        $featuredProduct = Product::withCount('orderProducts as featured_product')->latest()
            ->take(4)->orderByDesc('featured_product')->get(); /// top 6 featured Product
        $latestProduct = Product::with('category')->latest()->orderBy('created_at', 'desc')
            ->paginate(4); /// latest Product
        if (!$product) {
            return view('website.error-404');
        }
        return view('website.products.product-detels', compact('product', 'categories', 'featuredProduct', 'latestProduct'));
    }
    public function productShope(Request $request)
    {
        /// filter by category
        $query = Product::query();
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
        /// search by products
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }
        $products = $query->latest()->paginate(6);
        $categories = Category::withCount('products')->paginate(6);
        $featuredProduct = Product::withCount('orderProducts as featured_product')->latest()
            ->take(4)->orderByDesc('featured_product')->get(); /// top 6 featured Product
        return view('website.products.shoping', compact('products', 'categories', 'featuredProduct'));
    }
}
