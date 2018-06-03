<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable = ['category_id', 'sub_category'];

    public function category(){
        $this->belongsTo('App\category', 'category_id');
    }

    public function report(){
        $this->hasMany('App\Report', 'sub_category_id');
    }
}
