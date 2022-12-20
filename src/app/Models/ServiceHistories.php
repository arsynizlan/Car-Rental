<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceHistories extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}