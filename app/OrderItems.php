<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = ['order_id','product_id','quantity','price'];
}
