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
        	'title' => 'The River Crossing Puzzle',
        	'creator' => 'Alcuin of York',
        	'creation_date' => 0,
        	'description' => 'A farmer must bring three items across 
        					 the river (he must be on the raft to go 
        					 across). The top item may not be left 
        					 alone with the middle item and the middle 
        					 item may not be left alone with the last. 
        					 How can the farmer bring all the items 
        					 across the river?',
        	'directions' => 'The farmer may only take one item across at 
        					a time. Click an item to move it onto/off the 
        					raft. To win, all four characters must be on 
        					the right bank. Customize your game with the 
        					form on the game page.',
        	'image_path' => '/images/river_crossing.png',
        	'created' => true,
    	]);
    	
    	DB::table('puzzles')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'title' => 'The Tower of Hanoi',
        	'creator' => 'Édouard Lucas',
        	'creation_date' => 1883,
        	'description' => "The Tower of Hanoi (also called the Tower of Brahma or Lucas' Tower, 
        					 and sometimes pluralized) is a mathematical game or puzzle. 
        					 It consists of three rods, and a number of disks of different 
        					 sizes which can slide onto any rod.",
        	'directions' => 'The objective of the puzzle is to move the entire stack to another rod, 
        					obeying the following simple rules:
							only one disk can be moved at a time,
    						each move consists of taking the upper disk from one of the stacks and 
    						placing it on top of another stack (a disk can only be moved if it 
    						is the uppermost disk on a stack), and
    						no disk may be placed on top of a smaller disk.',
        	'image_path' => '/images/Tower_of_Hanoi.jpeg',
        	'created' => false,
    	]);
    	
    	DB::table('puzzles')->insert([
        	'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        	'title' => 'Miners and Minutes',
        	'creator' => 'Richard Hovasse',
        	'creation_date' => 1981,
        	'description' => 'Four miners have just been trapped in a mine cavern 
        					 that is about to collapse. In fact, it will collapse in
							 exactly 15 minutes. There is an open, but dark, dangerous, 
							 and narrow side tunnel leading to safety. Can you help the 
							 miners get out safely? This puzzle is a type of bridge and 
							 torch problem. Other names include The Midnight Train and 
							 Dangerous Crossing.',
        	'directions' => 'The cavern requires a lantern to traverse safely, and the 
        					miners only have one working lantern. In addition,
							only two miners can traverse the tunnel at a time with the lantern.
							Onika is uninjured and can walk the tunnel in one minute; Twitch 
							has a limp, but can walk the tunnel in two minutes; Fiona has a 
							broken foot, but can manage to get through in four minutes; 
							while Edward is more seriously injured and can only get
							through in eight minutes. How can they escape in time?',
        	'image_path' => '/images/miners.jpeg',
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