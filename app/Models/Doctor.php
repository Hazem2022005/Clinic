<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'major_id',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function isReserved($date, $time, $doctor_id)
    {
        return Reservation::where('doctor_id', $doctor_id)
            ->where('date', $date)
            ->where('time', $time)
            ->where('status', '!=', 'cancelled')
            ->exists();
    }
}
