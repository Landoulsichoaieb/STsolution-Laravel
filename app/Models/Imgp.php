<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgp extends Model
{

    protected $table = 'imgp';
    protected $fillable = [
        'user',
        'fileimg',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
