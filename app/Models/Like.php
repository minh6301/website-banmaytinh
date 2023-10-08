<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Like extends Model
{
    use HasFactory;

    public $table = 'likes';
    public $fillable = ['product_id',' user_id'];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

}
