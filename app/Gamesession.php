<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamesession extends Model
{
    public function puzzle() {
        // Gamesession belongs to Puzzle
        // define an inverse one-to-many relationship
        return $this->belongsTo('\App\Puzzle');
    }
    
    public function users() {
    	// define a many-to-many relationship
        return $this->belongsToMany('\App\User')->withTimestamps();;
    }
}
