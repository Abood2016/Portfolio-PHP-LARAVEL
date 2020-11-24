<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
   
    protected $fillable = [
        'site_title', 'job_title', 'image', 'location',
        'twitter_url', 'linkdin_url', 'facebook_url', 'about', 'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
