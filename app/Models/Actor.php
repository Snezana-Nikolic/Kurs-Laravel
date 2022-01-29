<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    public function movies(){
        // return $this->belongsToMany(Movie::class, "movie_action","actor_id","movie_id");
        return $this->belongsToMany(Movie::class);
    }
}
