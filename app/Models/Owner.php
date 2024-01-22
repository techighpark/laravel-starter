<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Owner extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function myCar(): HasOne
    {
        return $this->hasOne(Car::class);
    }
}
