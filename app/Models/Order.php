<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_date',
        'order_customer',
        'order_status',
        'order_note'
    ];
    
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;

    // Thêm relationship với order_detail
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
}
