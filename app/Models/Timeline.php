<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    protected $table = 'timeline';
    protected $fillable = [
        'user',
        'company',
        'project',
        'message',
        'status',
        'date',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
