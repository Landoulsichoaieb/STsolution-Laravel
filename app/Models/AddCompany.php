<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCompany extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'user',
        'address',
        'field',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
