<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'phone',
        'full_name',
        'has_inside_wash',
        'has_outside_wash',
        'has_premium_wash',
        'time_of_arrival',
    ];
}
