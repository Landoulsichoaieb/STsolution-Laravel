<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $table = 'cvs';
    protected $fillable = [
        'user',
        'cv',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
