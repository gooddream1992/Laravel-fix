<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileWishlist extends Model
{
    protected $fillable = ['escortId', 'image', 'image_url'];
}