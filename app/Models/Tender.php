<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    protected $fillable = [
        'ext_code',
        'number',
        'status',
        'name',
        'update_time'
    ];
}
