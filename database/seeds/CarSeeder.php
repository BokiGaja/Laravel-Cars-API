<?php

use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Car::class, 10)->create();
    }
}