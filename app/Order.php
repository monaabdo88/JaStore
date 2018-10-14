<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status','address','user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function orderitems(){
        return $this->hasMany(OrderItems::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class,'order_items');
    }
}
