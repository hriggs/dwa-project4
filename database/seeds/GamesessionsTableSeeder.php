<?php

use Illuminate\Database\Seeder;

class GamesessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// create random gamesession data for first 50 users
    	for ($i = 1; $i < 3; $i++) {
    		
    		// create random number of gamesessions for each user
    		$sessions = rand(1, 20);
    		for ($j = 1; $j < $sessions; $j++) {
    			
    			// generate random number of moves puzzle took
				$moves = rand(5, 50);  
				
				// whether puzzle was solved or not
				$solved = rand(0, 1);
				
				// insert data into table
    			DB::table('gamesessions')->insert([
			    	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			    	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			    	'user_id' => $i,
			    	'puzzle_id' => 1,
			    	'attempt_num' => $j,
			    	'start_time' => Carbon\Carbon::now()->toDateTimeString(),
			    	'end_time' => Carbon\Carbon::now()->toDateTimeString(),
			    	'moves' => $moves,
			    	'solved' => $solved,
			    ]);
    		}
    	}
    }
}