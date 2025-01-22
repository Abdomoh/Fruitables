<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{
    public function gatAllCategory()
    {

        return Category::orderBy('created_at', 'desc')->get();
    }

    public function createCategory(Request $request)
    {

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/category/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        $category = Category::create($input);
        return $category;
    }

    public function updateCategory(Request $request, $id)
    {

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/category/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        $category = Category::find($id);
        $category->update($input);
        return $category;
    }
}
