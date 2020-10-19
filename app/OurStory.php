<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurStory extends Model
{
    protected $fillable = [
         'title','status','description','imageurl',
    ];
}
