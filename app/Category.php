<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];

    public function items(){
        return $this->belongsToMany('App\Item', 'category_item');
    }
}
