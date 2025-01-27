<?php

namespace App\Services;

use App\Models\Product;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use App\Traits\TranslationTrait;

class ProductService
{
    use SlugTrait;
    use TranslationTrait;
    public function getAllProduct()
    {
        return Product::query()->orderBy('created_at', 'desc')->get();
    }

    public function createProduct(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/products/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }
        ///$input['categor_id'] = $request->category_id;
        $product = Product::create($input);
       // $input['categor_id'] = $request->category_id;



        $input['slug'] = $this->createSlug('Product', $product->id, $product->name, 'products');
        return $product;
    }

    public function updateProduct(Request $request, $id)
    {

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/products/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        } else{
            unset($input['image']);
        }
        $product = Product::findOrFail($id);
        $product->update($input);
        $input['slug'] = $this->createSlug('Product', $product->id, $product->name, 'products');
        return $product;
    }
}
