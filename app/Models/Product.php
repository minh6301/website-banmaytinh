<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillabel = ['tensanpham','slug','dacdiemnoibat', 'thongsokythuat', 'user_id', 'category_id', 'color_id', 'file'];


    public function getRouteKeyName(){
        return 'slug';
    }

    function user(){
        return $this -> hasMany('App\Models\User');
    }

    function category(){
        return $this -> belongsTo('App\Models\Category');
    }

    function featured(){
        return $this -> belongsTo('App\Models\Featured');
    }

    function color(){
        return $this -> belongsTo('App\Models\Color');
    }

    function cart(){
        return $this -> belongsTo('App\Models\Cart');
    }

    function like(){
        return $this -> belongsTo('App\Models\Like');
    }
}
