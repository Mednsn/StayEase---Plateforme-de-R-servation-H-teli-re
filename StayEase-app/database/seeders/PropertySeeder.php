<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = ['Wi-Fi', 'Climatisation', 'Vue sur mer', 'Piscine', 'Balcon'];
        foreach ($properties as $property) {
            Property::create([
                'name' => $property,
                'icon' => $property,
            ]);
        }
    }
}
