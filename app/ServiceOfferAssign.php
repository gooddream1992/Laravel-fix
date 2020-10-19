<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceOfferAssign extends Model
{
    protected $fillable = [
        'escortId','service','description' // SMPEDIT 12-10-2020
    ];
}
