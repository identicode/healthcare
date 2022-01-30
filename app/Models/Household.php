<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getGeoAttribute()
    {
        $coordinates = explode(', ', $this->coordinates);

        return collect([
            'lat' => $coordinates[0] ?? '',
            'lng' => $coordinates[1] ?? ''
        ]);


    }

    public function getGeolocationAttribute()
    {
        $coordinates = explode(', ', $this->coordinates);
        return dd_to_dms($coordinates[0], $coordinates[1]);
    }

    public function purok()
    {
        return $this->belongsTo(Purok::class, 'purok_id');
    }

    public function members()
    {
        return $this->hasMany(Citizen::class);
    }

    public function head()
    {
        return $this->belongsTo(Citizen::class, 'head_id');
    }

}
