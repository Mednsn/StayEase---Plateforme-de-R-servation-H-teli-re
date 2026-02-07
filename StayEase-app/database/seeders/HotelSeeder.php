<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    $managerRole = \App\Models\Role::firstOrCreate(['name' => 'Manager']);
    $adminRole = \App\Models\Role::firstOrCreate(['name' => 'Admin']);

    $users = \App\Models\User::factory(5)->create([
        'role_id' => $managerRole->id
    ]);

    foreach ($users as $user) {
        \App\Models\Hotel::factory(4)->create([
            'user_id' => $user->id,
        ]);
    }
}
}
