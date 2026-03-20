<!-- app/Models/Payment.php
| -- This is the Payment model for the hotel booking system. It represents a payment made for a specific booking.
 -->
<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'amount',
        'payment_method', // credit_card, paypal, etc.
        'status', // pending, completed, failed
    ];

    //Relationships
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}

