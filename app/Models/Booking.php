<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'table_id',
        'customer_name',
        'customer_email',
        'booking_time',
        'guest_count'
    ];

    protected $casts = [
        'booking_time' => 'datetime'
    ];

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
