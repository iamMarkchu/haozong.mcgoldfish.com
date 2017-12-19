<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $table = 'music';
    protected $fillable = ['name', 'lyrics', 'image', 'music_file', 'author'];
}