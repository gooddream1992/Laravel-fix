<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalResource extends Model
{
    protected $fillable = [
         'title','status','description','imageurl',
    ];
}
