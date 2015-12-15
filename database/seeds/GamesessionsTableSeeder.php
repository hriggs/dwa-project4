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
    	// create random gamesession data for most users
    	for ($i = 1; $i < 40; $i++) {
    		
    		// first gamesession start time
    		$start_time = Carbon\Carbon::now();
    		
    		// create random number of gamesessions for each user
    		$sessions = rand(1, 20);
    		for ($j = 1; $j < $sessions; $j++) {
    			
    			// generate random number of moves puzzle took
				$moves = rand(7, 30);  
				
				// generate random time
				$time = rand(1, 20);
				
				// generate random puzzle end time
				$end_time = $start_time->copy()->addMinutes($time);

				// insert data into table
    			DB::table('gamesessions')->insert([
			    	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			    	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			    	'user_id' => $i,
			    	'puzzle_id' => 1,
			    	'attempt_num' => $j,
			    	'start_time' => $start_time->toDateTimeString(),
			    	'end_time' => $end_time->toDateTimeString(),
			    	'total_time' => $time,
			    	'moves' => $moves,
			    ]);
			    
			    // random number between games
			    $interval = rand(1, 60);
			    
			    // increment start time
			    $start_time = $end_time->copy()->addMinutes($interval);
    		}
    	}
    	
    	// create random gamesession data for most users
    	for ($i = 1; $i < 40; $i++) {
    		
    		// first gamesession start time
    		$start_time = Carbon\Carbon::now();
    		
    		// create random number of gamesessions for each user
    		$sessions = rand(1, 20);
    		for ($j = 1; $j < $sessions; $j++) {
    			
    			// generate random number of moves puzzle took
				$moves = rand(5, 30);  
				
				// generate random time
				$time = rand(1, 20);
				
				// generate random puzzle end time
				$end_time = $start_time->copy()->addMinutes($time);

				// insert data into table
    			DB::table('gamesessions')->insert([
			    	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			    	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			    	'user_id' => $i,
			    	'puzzle_id' => 4,
			    	'attempt_num' => $j,
			    	'start_time' => $start_time->toDateTimeString(),
			    	'end_time' => $end_time->toDateTimeString(),
			    	'total_time' => $time,
			    	'moves' => $moves,
			    ]);
			    
			    // random number between games
			    $interval = rand(1, 60);
			    
			    // increment start time
			    $start_time = $end_time->copy()->addMinutes($interval);
    		}
    	}
    }
}