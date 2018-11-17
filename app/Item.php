<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function categories(){
        return $this->belongsToMany('App\Category', 'category_item');
    }


    protected $fillable = [
        'name',
        'item_code',
        'purchase_price',
        'retail_price',
        'image',
        'discount',
        'description'
    ];



}
