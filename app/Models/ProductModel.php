<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    public $timestamps = false;
    protected $primaryKey = 'product_id';
    
    protected $fillable = [
        'product_name',
        'product_price',
        'product_img',
        'product_description',
        'product_category'
    ];

}
