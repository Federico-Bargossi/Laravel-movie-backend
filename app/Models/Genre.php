<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function films()
{
    return $this->belongsToMany(Film::class);
}

}
