<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'name'      => 'array',
        'is_medic' => 'boolean'
    ];

    public function account()
    {
        return $this->morphOne(User::class, 'accountable');
    }
}
