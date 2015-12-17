<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamesessions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id');
            $table->integer('puzzle_id')->unsigned();
            
            // `puzzle_id` is a foreign key that connects to the `id` field in the `puzzles` table
            $table->foreign('puzzle_id')->references('id')->on('puzzles');
            
            $table->integer('attempt_num');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->double('total_time');
            $table->integer('moves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	// drop foreign keys and related columns
    	Schema::table('gamesessions', function (Blueprint $table) {
            $table->dropForeign('gamesessions_puzzle_id_foreign');
            $table->dropColumn('puzzle_id');
        });
        
        // drop table
        Schema::drop('gamesessions');
    }
}