<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = [
        'name',
        'img_url',
        'description',
        'price',
        'discount',
        'stock_quantity',
        'category_id',
    ];

    public function categories()
    {
        return  $this->belongsTo(Categorie::class, 'category_id');
    }

}
