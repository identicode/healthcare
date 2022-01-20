<?php

namespace App\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name'      => 'array',
        '4ps'       => 'boolean',
        'ips'       => 'boolean',
        'props'     => 'json',
        'birthdate' => 'date',
    ];

    public function getDobAttribute()
    {
        return Carbon::parse($this->birthdate);
    }

    public function getAgeAttribute()
    {
        if($this->dob->age == 0){
            return Carbon::now()->diffInMonths($this->dob).'/m';
        }

        return $this->dob->age.'/y';
    }

    public function household()
    {
        return $this->belongsTo(Household::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'citizen_id');
    }
}
