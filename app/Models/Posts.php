<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user',
        'myfield',
        'prog1',
        'prog2',
        'frame1',
        'frame2',
        'details',
        'postdate',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
