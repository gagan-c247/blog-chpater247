<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded= [];


    public function blog(){
        return $this->hasmany('App\Models\Blog',);
    }
}
