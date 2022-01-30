<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Citizen extends Model
{
    use HasFactory, BelongsToThrough;

    protected $guarded = [];

    protected $casts = [
        'name'      => 'array',
        '4ps'       => 'boolean',
        'ips'       => 'boolean',
        'props'     => 'json',
        'is_dead'   => 'boolean',
        'birthdate' => 'date',
    ];

    public function getDobAttribute()
    {
        return Carbon::parse($this->birthdate);
    }

    public function getAgeRawAttribute()
    {
        return $this->dob->age;
    }

    public function getAgeAttribute()
    {
        if($this->dob->age == 0){
            return Carbon::now()->diffInMonths($this->dob).'/m';
        }

        return $this->dob->age.'/y';
    }

    public function purok()
    {
        return $this->belongsToThrough(Purok::class, Household::class);
    }

    public function household()
    {
        return $this->belongsTo(Household::class, 'household_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'citizen_id');
    }

}
