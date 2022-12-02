<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'regular_quantity',
        'regular_advance_price',
        'regular_gate_price',
        'vip_quantity',
        'vip_advance_price',
        'vip_gate_price',
        'vvip_quantity',
        'vvip_advance_price',
        'vvip_gate_price',
        'kids_quantity',
        'kids_advance_price',
        'kids_gate_price',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // total tickets 
    public function totalTickets()
    {
        return $this->regular_quantity + $this->vip_quantity + $this->vvip_quantity + $this->kids_quantity;
    }

}
