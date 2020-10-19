<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileFavourite extends Model
{
    protected $fillable = ['escortId', 'tags', 'description'];
}