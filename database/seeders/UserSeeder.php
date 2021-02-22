<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker =Faker::create('id_ID');
        
        for ($i = 1; $i <= 50; $i++) {
            DB::table('users')->insert(
                [
                    'name' => $faker->name(),
                    'email' => $faker->email(),
                    'gender' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                    'password' => bcrypt('123456789'),
                    'remember_token' => Str::random(12),
                    'address' => $faker->address(),
                    'telp' => $faker->unique()->phoneNumber,
                    'avatar' => "default.png",
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            );
          }
    }
}
