<!-- app/Providers/AppServiceProvider.php 
| -- Provider for application services
-->
<?php
namespace App\Providers;

use App\Repositories\Interfaces\RoomRepositoryInterface;
use App\Repositories\Eloquent\RoomRepository;

use App\Repositories\Interfaces\BookingRepositoryInterface;
use App\Repositories\Eloquent\BookingRepository;

use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Repositories\Eloquent\PaymentRepository;

public function register(): void
{
    // Bind RoomRepositoryInterface to RoomRepository
    $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);

    // Bind BookingRepositoryInterface to BookingRepository
    $this->app->bind(BookingRepositoryInterface::class, BookingRepository::class);

    // Bind PaymentRepositoryInterface to PaymentRepository
    $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
}
