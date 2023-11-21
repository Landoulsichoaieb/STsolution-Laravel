<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interrested extends Model
{
    protected $table = 'interrested';
    protected $fillable = [
        'id',
        'user',
        'post',
        'status',
        'interdate',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
