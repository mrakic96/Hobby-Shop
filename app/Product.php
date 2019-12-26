<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'details','image', 'price', 'description', 'category_id'];

    public function category(){

        $this->belongsTo('App\Category');
    }
}
