<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nutritional extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function appointment()
    {
        return $this->morphOne(Appointment::class, 'medicable', 'medic_type', 'medic_id', 'id');
    }
}
