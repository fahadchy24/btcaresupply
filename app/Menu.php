<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [ 
        'name', 'url'
    ];

    public function subcategory(){
        return $this->hasMany(SubCategory::class, 'category_id');
    }
    public function childcategories(){
        return $this->hasMany(ChildCategory::class, 'category_id');
    }

    public $timestamps = false;
}
