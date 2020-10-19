<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeComment extends Model
{
    protected $fillable = [
         'escortId','userId','likes','name','email','comments',
    ];
}
