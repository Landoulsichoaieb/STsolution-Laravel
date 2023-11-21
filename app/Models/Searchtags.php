<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Searchtags extends Model
{
    protected $table = 'searchtag';
    protected $fillable = [
        'typetag',
        'searchtag',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id';
}
