<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileTour extends Model
{
    protected $fillable = [
        'escortId','status','city','startDate','endDate',
    ];
}
