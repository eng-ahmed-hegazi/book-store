<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name'];

    public function books(){
        return $this->hasMany('App\Book');
    }

    public function subcategories(){
        return $this->hasMany('App\Subcategory');
    }


}
