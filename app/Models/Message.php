<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $fillable = [
        'sender',
        'user',
        'company',
        'timeline',
        'message',
        'status',
        'date',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
