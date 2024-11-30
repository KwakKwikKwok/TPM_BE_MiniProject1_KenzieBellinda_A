<?php

namespace Database\Factories;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuestFactory extends Factory
{
    protected $model = Guest::class;

    public function definition()
    {
        return [
            'name' => fake() ->name(),
            'email' => fake() ->unique()->safeEmail(),
            'phone' => fake() ->phoneNumber()
        ];
    }
}
