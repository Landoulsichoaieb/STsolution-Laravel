<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destext extends Model
{
    protected $table = 'Destext';
    protected $fillable = [
        'user',
        'description',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
