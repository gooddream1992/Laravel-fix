<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientRelationship extends Model
{
    protected $fillable = [
         'title','status','description','imageurl',
    ];
}
