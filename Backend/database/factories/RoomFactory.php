<!-- database/factories/RoomFactory.php 
| -- Room Factory
| -- This is the Room factory for generating test data for the Room model.
 -->
<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'room_number' => $this->faker->unique()->numberBetween(100, 999), // Unique room number
            'type' => $this->faker->randomElement(['single', 'double', 'suite']), // Random room type
            'status' => $this->faker->randomElement(['available', 'occupied', 'maintenance']), // Random room status
            'price' => $this->faker->randomFloat(2, 50, 500), // Random price between 50 and 500
        ];
    }
}
