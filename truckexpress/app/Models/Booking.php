<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_code',
        'name',
        'phone',
        'origin',
        'destination',
        'truck_type',
        'date',
        'status',
        'driver_name',
        'plate_number',
        'tracking_lat',
        'tracking_lng',
        'notes',
    ];

    protected $casts = [
        'date' => 'date',
        'tracking_lat' => 'float',
        'tracking_lng' => 'float',
    ];
}
