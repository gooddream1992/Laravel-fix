<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $fillable = [
         'date','status','escortId','title','description','image','url',
    ];
}
