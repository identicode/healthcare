<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getGeolocationAttribute()
    {
        $coordinates = explode(', ', $this->coordinates);
        return dd_to_dms($coordinates[0], $coordinates[1]);
    }

    public function purok()
    {
        return $this->belongsTo(Purok::class);
    }

}
