<!-- app/Models/User.php 
| -- This is the User model for the hotel booking system. It uses Laravel's built-in authentication features and Sanctum for API token management.
 -->
<?php
namespace App\Models;

use Illuminate\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // admin or customer
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    
}
