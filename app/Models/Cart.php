<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';


    protected $fillable = ['id',  'user_id', 'price', 'quantity', 'total', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAuthUser($query)
    {
        $query->where('user_id', Auth::user()->id);
    }
}
