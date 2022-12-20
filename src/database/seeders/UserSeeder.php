<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Arsy Nizlan R',
            'email' => 'admin@example.com',
            'password' => Hash::make("password"),
        ])->assignRole('Admin');

        $faker = Factory::create('id_ID');

        for ($i = 1; $i <= 4; $i++) {
            User::factory()->create([
                'name' => $faker->name(),
                'email' => 'user' . $i . '@example.com',
                'password' => Hash::make("password"),
            ])->assignRole('Responsible Person');
        }
    }
}