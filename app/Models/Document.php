<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'title' , 'file' , 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
