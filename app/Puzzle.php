<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    public function gamesession() {
        // Puzzle has many Gamesession
        // Define a one-to-many relationship.
        return $this->hasMany('\App\Gamesession');
    }
}
