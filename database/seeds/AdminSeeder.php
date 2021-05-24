<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker\Factory::create();
        DB::table('users')->insert([
            'name' => 'Rahul Chhetri',
            'email' => 'superrahul23@gmail.com',
            'password'=> Hash::make('password'),
            'gender'=> 'M',
            'address'=>$faker->city,
            'phone_number' => $faker->phoneNumber,
            'vehical_type'=> 'two wheeler',
            'role' => true
        ]);
    }
}
