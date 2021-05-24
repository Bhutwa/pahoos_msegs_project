<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { $faker= Faker\Factory::create();
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password'=> Hash::make('password'),
            'gender'=> 'M',
            'address'=>$faker->city,
            'phone_number' => $faker->phoneNumber,
            'vehical_type'=> 'two wheeler'
        ]);
    }
}
