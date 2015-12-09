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
    	// credentials for teaching staff login
	   	$user = \App\User::firstOrCreate(['email' => 'jill@harvard.edu']);
	   	$user->username = 'jill123';
	    $user->name = 'Jill';
	    $user->email = 'jill@harvard.edu';
	    $user->password = \Hash::make('helloworld');
	 	$user->city = 'Cambridge';
	 	$user->state = 'Massachusetts';
	 	$user->country = 'USA';
	 	$user->bio = 'My name is Jill and I am a student at the Harvard Extension!';
	    $user->save();
	
	    $user = \App\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
	    $user->username = 'jamal123';
	    $user->name = 'Jamal';
	    $user->email = 'jamal@harvard.edu';
	    $user->password = \Hash::make('helloworld');
	    $user->city = 'Cambridge';
	 	$user->state = 'Massachusetts';
	 	$user->country = 'USA';
	 	$user->bio = 'My name is Jamal and I am a student at the Harvard Extension!';
	    $user->save();
    	
    	// use the factory to create a Faker\Generator instance
		$faker = Faker::create();
		
		// generate random user data
		for($i = 0; $i < 50; $i++) {
			
			$email = $faker->email;
			
			$user = \App\User::firstOrCreate(['email' => $email]);
			$user->created_at = $faker->dateTimeThisDecade($max = 'now');
			$user->updated_at = $faker->dateTimeThisDecade($max = 'now');
	   		$user->username = $faker->userName;
	    	$user->name = $faker->name;
	    	$user->email = $email;
	    	$user->password = \Hash::make($faker->password);
	 		$user->city = $faker->city;
	 		$user->state = $faker->state;
	 		$user->country = $faker->country;
	 		$user->bio = $faker->text;
	    	$user->save();			
    	}
    }
}