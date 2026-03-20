<!-- database/factories/UserFactory.php 
| -- 
 -->
<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Default password for testing
            'role' => $this->faker->randomElement(['admin', 'staff','customer']), // Randomly assign role
            'remember_token' => \Str::random(10),
        ];
    }
}

