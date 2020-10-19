<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderResource extends Model
{
    protected $fillable = [
        'titleHead','intro','title1','icon1','title2','icon2','title3','icon3','title4','icon4',
    ];
}
