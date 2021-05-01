<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsto('App\Models\Category');
    }
    public function blog(){
        return $this->belongsto('App\Models\Blog');
    }
}
