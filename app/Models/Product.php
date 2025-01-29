<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'description', 'price', 'quentity', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'product_id');
    }
    public function getImageFullPathAttribute()
    {
        return $this->image ? env('APP_URL') . 'uploads/products/' . $this->image : null;
    }
    public function getNameArAttribute()
    {
        $translation = Translation::where('model', 'Product')
            ->where('row_id', $this->attributes['id'])
            ->where('field', 'name')
            ->first();
        return $translation ? $translation->value : null;
    }
    public function getDescriptionArAttribute()
    {
        $translation = Translation::where('model', 'Product')
            ->where('row_id', $this->attributes['id'])
            ->where('field', 'description')
            ->first();
        return $translation ? $translation->value : null;
    }
    public function getSlugAttribute()
    {
        $slug = Slug::where('model', 'Product')
            ->where('row_id', $this->attributes['id'])
            ->first();
        return $slug ? $slug->value : null;
    }
}
