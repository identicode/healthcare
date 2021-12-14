<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purok extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function households()
    {
        return $this->hasMany(Household::class);
    }
}
