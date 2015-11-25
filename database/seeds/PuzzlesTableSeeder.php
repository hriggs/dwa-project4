<?php

use Illuminate\Database\Seeder;

class PuzzlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('puzzles')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'title' => 'The Frog Puzzle',
        	'creator' => 'Unknown',
        	'creation_date' => "",
        	'description' => 'description here!',
        	'directions' => 'Directions here!',
        	'image_path' => 'image path here!',
        	'created' => true,
    	]);
    	
    	DB::table('puzzles')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'title' => 'The Tower of Hanoi',
        	'creator' => 'Édouard Lucas',
        	'creation_date' => 1883,
        	'description' => 'description here!',
        	'directions' => 'Directions here!',
        	'image_path' => 'image path here!',
        	'created' => false,
    	]);
    	
    	DB::table('puzzles')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'title' => 'Not Created',
        	'creator' => 'Édouard Lucas',
        	'creation_date' => 1883,
        	'description' => 'description here!',
        	'directions' => 'Directions here!',
        	'image_path' => 'image path here!',
        	'created' => false,
    	]);
    	
    	DB::table('puzzles')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'title' => 'Created',
        	'creator' => 'Édouard Lucas',
        	'creation_date' => 1883,
        	'description' => 'description here!',
        	'directions' => 'Directions here!',
        	'image_path' => 'image path here!',
        	'created' => true,
    	]);
    }
}