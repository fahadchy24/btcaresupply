<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    protected $fillable = [ 
        'subcategory_id', 'childcategory_name','childcategory_url', 'childcategory_description',  'cover_image', 'status'
    ];

    public function subcategory(){
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
}
