<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $table = 'data';
    protected $fillable = ['title', 'description', 'ref_number', 'date', 'area', 'status', 'note'];
}
