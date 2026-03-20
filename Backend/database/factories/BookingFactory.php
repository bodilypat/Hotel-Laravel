<!-- database/Factories/PaymentFactory.php 
| -- Payment Factory 
| -- This is the Payment factory for generating test data for the Payment model.
 -->
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'booking_id' => \App\Models\Booking::factory(), // Create a new booking for each payment
            'amount' => $this->faker->randomFloat(2, 50, 500), // Random payment amount between 50 and 500
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'bank_transfer']), // Random payment method
            'status' => $this->faker->randomElement(['completed', 'pending', 'failed']), // Random payment status
        ];
    }
}

