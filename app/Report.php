<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = ['name', 'tgl', 'category_id', 'sub_category_id', 'progress'];

    public function category(){
       return $this->belongsTo('App\Category', 'category_id');
    }

    public function subcategory(){
       return $this->belongsTo('App\SubCategory', 'sub_category_id');
    }
}
