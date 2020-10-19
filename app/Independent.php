<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Independent extends Model
{
    protected $fillable = [
        'icon','bgimage','topHead','title','description',
    ];
}
