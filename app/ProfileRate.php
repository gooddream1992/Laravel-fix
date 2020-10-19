<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileRate extends Model
{
    protected $fillable = [
        'escortId','status','time','price', 'description',
    ];
}
