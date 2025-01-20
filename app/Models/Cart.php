<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Cart extends Model
{
    //
    protected $table = 'carts';
    protected $fillable = [
        'total_price',
        'quantity',
        'product_id',
        'user_id',
        'order_id'
    ];

    public function products()
    {
        return  $this->belongsTo(Product::class, 'product_id');
    }

    public function users()
    {
        return  $this->belongsTo(User::class, 'user_id');
    }

    public function orders()
    {
        return  $this->belongsTo(Order::class, 'order_id');
    }
}
