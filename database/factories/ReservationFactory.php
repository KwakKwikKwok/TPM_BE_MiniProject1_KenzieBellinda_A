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
            'reservation_time' => fake() ->dateTimeThisYear(),
            'seats' => fake() ->numberBetween(1, 10),
            'image_path' => fake() ->imageUrl()
        ];
    }
}

