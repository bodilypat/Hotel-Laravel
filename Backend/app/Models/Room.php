<!-- app/Models/Room.php 
| -- This is the Room model for the hotel booking system. It represents a room available for booking.
 -->
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'type',
        'price',
        'status', // available, booked, maintenance
    ];

    //Relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

