<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';
    protected $fillable = ['category_id', 'sub_category', 'target'];

    public function category(){
       return $this->belongsTo('App\Category', 'category_id');
    }

    public function report(){
       return $this->hasMany('App\Report', 'sub_category_id');
    }
}
