<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profileimg extends Model
{
    protected $table = 'profile_image';
    protected $fillable = [
        'id',
        'user_id',
        'img_path',
        'updated_at',
    ];
}
