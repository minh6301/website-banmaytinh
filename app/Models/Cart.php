<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ['user_id', 'quantity', 'product_id'];

    function product(){
        return $this->belongsTo('App\Models\Product');
    }
    function user(){
        return $this->belongsTo('App\Models\User');
    }
}
