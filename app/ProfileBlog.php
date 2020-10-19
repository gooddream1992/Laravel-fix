<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileBlog extends Model
{
    protected $fillable = [
        'escortId','status','title','image','url',
    ];
}
