<?php

namespace App\Http\Controllers\Admin;


use App\Models\Product;

use App\Models\Category;

use App\Traits\SlugTrait;
use App\Services\ProductService;
use App\Traits\TranslationTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    use TranslationTrait;
    use SlugTrait;

    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        $products = $this->productService->getAllProduct();
        $categories= Category::query()->select('id','name')->get();
        return view('dashboard.products.index', compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validate =$request->validated();
        $data = $this->productService->createProduct($request);
        $data->save();
        $this->translate($request, 'Product', $data->id);
        session::flash('success', 'تمت   الاضافة  بنجاح ');
        return redirect('dashboard/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {

        $validate = $request->validated();
        $data = $this->productService->updateProduct($request, $id);
        $this->editTranslation($request, 'Product', $data->id);
        $data->save();
        session::flash('update', 'تم   التعديل  بنجاح ');
        return redirect('dashboard/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product= Product::find($id);
        $image_path = public_path().'/uploads/products/'.$product->image;
        unlink($image_path);
        $product->delete();
        session::flash('update', 'تم   الحزف  بنجاح ');
        return redirect('dashboard/products');
}
}