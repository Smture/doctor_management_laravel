<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public static $TABLE = "APPOINTMENTS";

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'slot_id',
        'time_slot',
        'status'
    ];
}
