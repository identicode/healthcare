<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'schedule' => 'datetime'
    ];

    public function citizen()
    {
    return $this->belongsTo(Citizen::class, 'citizen_id');
    }

    public function medic()
    {
        return $this->morphTo();
    }
}
