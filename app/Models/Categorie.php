<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model //هانا اسم ال model
{
    //
    protected $table = 'categories';//هانا اسم ال migration
    protected $fillable = [
        'name',
        'description',
  
    ];

    public function products()//هانا اسم ال migration
    {
        return  $this->hasmany(Product::class, 'category_id');//هانا اسم ال model
    }

}
