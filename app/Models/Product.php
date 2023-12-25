<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Flashproduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function Cart(){
        return $this->hasOne(Cart::class);
    }
    public function Checkout(){
        return $this->hasOne(Checkout::class);
    }
    public function Flashproduct(){
        return $this->hasOne(Flashproduct::class);
    }
}
