<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileDescription extends Model
{
    protected $fillable = [
        'escortId','status','description',
    ];
}
