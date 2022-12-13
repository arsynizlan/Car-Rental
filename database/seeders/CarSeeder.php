<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'name' => 'Avanza',
            'type' => 'Angkutan Orang',
            'lisence_plate' => 'D1111ACF',
            'owner' => 'Milik Perusahaan'
        ]);
        Car::create([
            'name' => 'Mitsubishi',
            'type' => 'Angkutan Barang',
            'lisence_plate' => 'D1112ACF',
            'owner' => 'Sewaan'
        ]);
        Car::create([
            'name' => 'Hino',
            'type' => 'Angkutan Barang',
            'lisence_plate' => 'D1113ACF',
            'owner' => 'Sewaan'
        ]);
        Car::create([
            'name' => 'Honda CR-V',
            'type' => 'Angkutan Orang',
            'lisence_plate' => 'D1114ACF',
            'owner' => 'Milik Perusahaan'
        ]);
        Car::create([
            'name' => 'Volvo',
            'type' => 'Angkutan Barang',
            'lisence_plate' => 'D1115ACF',
            'owner' => 'Milik Perusahaan'
        ]);
    }
}