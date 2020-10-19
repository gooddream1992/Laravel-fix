<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientRelationQuestion extends Model
{
    protected $fillable = [
         'status','description',
    ];
}
