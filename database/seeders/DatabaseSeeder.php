<?php

namespace Database\Seeders;

use App\Models\Guest;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $guests = Guest::factory(20)->create();  
        foreach ($guests as $guest) {
            Reservation::factory(1)->create([
                'guest_id' => $guest->id,  
            ]);
        }

    }
}
