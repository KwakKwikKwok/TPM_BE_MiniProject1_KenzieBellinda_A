<?php

namespace Database\Factories;

use App\Models\Guest;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        return [
            'guest_id' => Guest::factory(), 
            'reservation_time' => $this->faker->dateTimeThisYear(),
            'seats' => $this->faker->numberBetween(1, 10),
        ];
    }
}

