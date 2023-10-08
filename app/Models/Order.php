<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        "fullname" ,
        "phone" , 
        "email" ,
        "city" ,
        "district",
        "ward",
        "home",
        "yeucau",
        "totalprice",
        "product",
        "user_id"
    ];

    function user(){
        return $this->belongsTo('App\Models\User');
    }
}
