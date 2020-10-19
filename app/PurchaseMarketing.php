<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseMarketing extends Model
{
    protected $fillable = [
         'title','status','description','imageurl',
    ];
}
