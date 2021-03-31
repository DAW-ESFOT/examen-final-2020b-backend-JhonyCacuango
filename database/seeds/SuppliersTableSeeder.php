<?php

use App\Suppliers;
use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Suppliers::truncate();
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Suppliers::create([
                'name' => $faker->name,
                'registered_by' => $faker->name,
            ]); }
    }
}
