<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timelinefetch extends Model
{
    protected $table = 'timelinefetch';
    protected $fillable = [
        'user',
        'timeline',
        'title',
        'description',
        'type',
        'datemeeting',
        'status',
        'date',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
