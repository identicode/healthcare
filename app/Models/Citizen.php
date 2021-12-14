<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name'      => 'array',
        'birthdate' => 'date',
        '4ps'       => 'boolean',
    ];

    public function household()
    {
        return $this->belongsTo(Household::class);
    }
}
