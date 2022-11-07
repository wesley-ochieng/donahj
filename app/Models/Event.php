<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    //count tickets sold
    public function ticketsSold()
    {
        return $this->tickets()->count();
    }

    public function eventPrice()
    {
        return $this->hasOne(EventPrice::class);
    }

    public function eventPrices()
    {
        return $this->hasMany(EventPrice::class);
    }



}
