<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['nama', 'project', 'tgl_target', 'target'];

    public function sub_category(){
        $this->hasMany('App\Subcategory', 'category_id');
    }

    public function report(){
        $this->hasMany('App\Report', 'category_id');
    }
}
