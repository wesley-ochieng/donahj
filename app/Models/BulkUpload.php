<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'payment_code',
        'initiation_time',
        'details',
        'transaction_status',
        'amount',
        'other_party',
        'status',
    ];
}
