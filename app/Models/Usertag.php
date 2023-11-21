<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertag extends Model
{
    protected $table = 'usertag';
    protected $fillable = [
        'user',
        'myfield',
        'prog1',
        'prog2',
        'frame1',
        'frame2',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
