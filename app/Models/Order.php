<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model //model name
{
    //
    protected $table = 'orders'; // migratoion name
    protected $fillable = [
        'total_price',
        'order_date',
        'status'
    ];

    public function order_details() // migration name
    {
        return  $this->hasMany(Order_detail::class,'order_id'); // model name
    }

    public function carts() // migration name
    {
        return  $this->hasMany(Cart::class,'order_id'); // model name
    }

}
