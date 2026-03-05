<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'order_product_id',
        'order_product_quantity',
        'order_product_price'
    ];
    
    protected $table = 'order_detail';
    protected $primaryKey = 'order_detail_id';
    public $timestamps = false;
    

}