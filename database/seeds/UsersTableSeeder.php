<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// credentials for instructor/TA login
    	DB::table('users')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'username' => 'Jill@harvard.edu',
        	'password' => 'helloworld',
        	'name' => "Jill",
        	'email' => 'Jill@harvard.edu',
        	'city' => 'Cambridge',
        	'state' => 'Massachusetts',
        	'country' => 'USA',
        	'bio' => 'My name is Jill and I am a student at the Harvard Extension!',
    	]);
    	
    	// use the factory to create a Faker\Generator instance
		$faker = Faker::create();
		
		// generate random user data
		for($i = 0; $i < 100; $i++) {
			DB::table('users')->insert([
        		'created_at' => $faker->dateTimeThisDecade($max = 'now'),
        		'updated_at' => $faker->dateTimeThisDecade($max = 'now'),
        		'username' => $faker->userName,
        		'password' => $faker->password,
        		'name' => $faker->name,
        		'email' => $faker->email,
        		'city' => $faker->city,
        		'state' => $faker->state,
        		'country' => $faker->country,
        		'bio' => $faker->text,
    		]);
    	}
    }
}
