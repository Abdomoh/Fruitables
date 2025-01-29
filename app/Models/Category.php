<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'image',
    ];
    public function getImageFullPathAttribute()
    {
        return $this->image ? env('APP_URL') . 'uploads/categories/' . $this->image : null;
    }
    public function getNameArAttribute()
    {
        $translation = Translation::where('model', 'Category')
            ->where('row_id', $this->attributes['id'])
            ->where('field', 'name')
            ->first();
        return $translation ? $translation->value : null;
    }
    public function getDescriptionArAttribute()
    {
        $translation = Translation::where('model', 'Category')
            ->where('row_id', $this->attributes['id'])
            ->where('field', 'description')
            ->first();
        return $translation ? $translation->value : null;
    }
    public function getSlugAttribute()
    {
        $slug = Slug::where('model', 'Category')
            ->where('row_id', $this->attributes['id'])
            ->first();
        return $slug ? $slug->value : null;
    }
    public function products()
    {
        return $this->hasMany(Product::class,'category_id');
    }
}
