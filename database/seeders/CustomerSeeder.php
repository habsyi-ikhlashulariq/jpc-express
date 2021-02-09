<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker =Faker::create('id_ID');
        
        for ($i = 1; $i <= 50; $i++) {
            DB::table('customer')->insert(
                [
                    'namaCustomer' => $faker->name(),
                    'emailCustomer' => $faker->email(),
                    'noTelpCustomer' => $faker->phoneNumber(),
                    'genderCustomer' => $faker->randomElement(['male', 'female']),
                    'alamatCustomer' => $faker->address(),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            );
          }
    }
}
