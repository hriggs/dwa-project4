<?php

use Illuminate\Database\Seeder;

class GamesessionUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// get all gamesessions 
        $gamesessions = \App\Gamesession::all();
        
        // for every gamesession
        foreach($gamesessions as $session) {
    		
    		// insert data into table
    		DB::table('gamesession_user')->insert([
		    	'created_at' => $session->created_at,
		    	'updated_at' => $session->updated_at,
		    	'gamesession_id' => $session->id,
		    	'user_id' => $session->user_id,
		    ]);
		}
    }
}
