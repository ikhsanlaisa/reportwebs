<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'subcategories';
    protected $fillable = ['name', 'tgl', 'category_id', 'sub_category', 'progress'];

    public function category(){
        $this->belongsTo('App\Category', 'category_id');
    }

    public function subcategory(){
        $this->belongsTo('App\SubCategory', 'sub_category_id');
    }
}
