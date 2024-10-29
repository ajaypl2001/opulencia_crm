<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'building_name',
        'address',
        'tower_name',
        'floor_number',
        'flat_number',
        'flat_type',
        'size',
        'status',
    ];
}
