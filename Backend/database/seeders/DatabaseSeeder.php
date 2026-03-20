<!-- database/Seeders/DatabaseSeeder.php 
| Database Seeder 
| -- This is the main database seeder for generating test data.
 -->
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $user->posts()->saveMany(Post::factory(5)->make());
        });
        Room::factory(10)->create()->each(function ($room) {
            $room->messages()->saveMany(Message::factory(20)->make());
        });
        Booking::factory(10)->create();
        Payment::factory(10)->create();
    }

    /**
     * Seed the application's database with test data.
     *
     * @return void
     */    public function seedTestData(): void
    {
        // Create 10 users with posts
        User::factory(10)->create()->each(function ($user) {
            $user->posts()->saveMany(Post::factory(5)->make());
        });

        // Create 10 rooms with messages
        Room::factory(10)->create()->each(function ($room) {
            $room->messages()->saveMany(Message::factory(20)->make());
        });

        // Create 10 bookings
        Booking::factory(10)->create();

        // Create 10 payments
        Payment::factory(10)->create();
    }
}

