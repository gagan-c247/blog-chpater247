<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{   
    protected  $guarded = [];

    public function file(){
        return $this->belongsTo('App\Models\File','file_id');
    }

    public function comment(){
        return $this->hasmany('App\Models\Comment','Blog_id');
    }
    public function blogcategory(){
        return $this->hasone('App\Models\BlogCategory')->with('category');
    }
}
