<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $room = Room::create([
            'hotel_id' => 1,
            'number' => '101',
            'price_per_night' => 150.00,
            'capacity' => 2,
            'description' => 'Chambre standard confortable',
        ]);

        
        $room->tags()->attach([1, 2]);
        $room->properties()->attach([1, 3]);
    }
}
