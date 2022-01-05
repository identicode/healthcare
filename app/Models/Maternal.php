<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maternal extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'baby' => 'json',
        'props' => 'json'
    ];

    public function baby_info()
    {
        return $this->belongsTo(Citizen::class, 'baby');
    }
}
