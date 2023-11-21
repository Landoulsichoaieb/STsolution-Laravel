<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follow';
    protected $fillable = [
        'user',
        'company',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
