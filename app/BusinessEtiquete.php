<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessEtiquete extends Model
{
    protected $fillable = [
         'title','status','description','imageurl',
    ];
}
