<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['name','photo'];

    public function actors(){
        return $this->belongsToMany(Actor::class, 'movie_actor');
    }

    // protected $guarded = []; ovo je manje sigurno u odnosu na ovo gore
}
