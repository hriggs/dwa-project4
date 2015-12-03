<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesessionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamesession_user', function (Blueprint $table) {

	    	$table->increments('id');
	        $table->timestamps();

	        $table->integer('gamesession_id')->unsigned();
	        $table->integer('user_id')->unsigned();
	
	        // make foreign keys
	        $table->foreign('gamesession_id')->references('id')->on('gamesessions');
	        $table->foreign('user_id')->references('id')->on('users');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop('gamesession_user');
    }
}