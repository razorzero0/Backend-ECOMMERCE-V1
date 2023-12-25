<?php

namespace App\Models;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function Product(){
        return $this->belongsTo(Product::class);
    }
    public function User(){
        return $this->belongsTo(User::class);
    }
}
