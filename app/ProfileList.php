<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileList extends Model
{
    protected $fillable = [
        'escortId','status','description',
    ];
}
