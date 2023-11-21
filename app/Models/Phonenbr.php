<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phonenbr extends Model
{
    protected $table = 'phonenbr';
    protected $fillable = [
        'user',
        'phonenbr',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
