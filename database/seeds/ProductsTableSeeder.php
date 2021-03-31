<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $faker = \Faker\Factory::create();

        $users = \App\User::all();
        foreach ($users as $user) {

            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);

            for ($i = 0; $i < 10; $i++) {
                Product::create([
                    'name' => $faker->firstName,
                    'code' => $faker->uuid,
                    'price' => $faker->randomNumber(2),
                    'status' => 'active',
                ]);
            }
        };
    }
}
