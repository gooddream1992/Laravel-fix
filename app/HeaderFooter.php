<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderFooter extends Model
{
    protected $fillable = [
        'headerLogo','footerLogo','youtube','youtubeurl','facebook','facebookurl','tweeter','tweeterurl','linkedin','linkedinurl','instagram','instagramurl','footerTitle','footerInfo','copyrights',
    ];
}
