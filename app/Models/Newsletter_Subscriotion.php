<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter_Subscriotion extends Model
{
    //
    protected $table = 'newsletter_subscriptions';
    protected $fillable = [
        'email',    
       
    ];

}
