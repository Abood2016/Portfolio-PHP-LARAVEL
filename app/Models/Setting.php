<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
   
    protected $fillable = [
        'site_title', 'job_title', 'image', 'location',
        'twitter_url', 'linkdin_url', 'facebook_url', 'about', 
    ];


    
}
