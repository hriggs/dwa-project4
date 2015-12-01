<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamesession extends Model
{
    public function puzzle() {
        // Gamesession belongs to Puzzle
        // Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\Puzzle');
    }
}
