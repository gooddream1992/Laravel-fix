<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileAvailability extends Model
{
    protected $fillable = [
        'escortId','weekday','fromDate','untilDate',
    ];
}
