<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function ServiceHistories()
    {
        return $this->hasOne(ServiceHistories::class);
    }
}