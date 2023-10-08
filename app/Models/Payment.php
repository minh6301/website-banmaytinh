<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'vnp_Amount',
        'vnp_BankCode',
        'vnp_OrderInfo',
        'vnp_PayDate',
        'vnp_ResponseCode',
        'vnp_TxnRef',
        'vnp_BankTranNo',
        'user_id',

    ];

    function user(){
        return $this->belongsTo('App\Models\User');
    }
}
