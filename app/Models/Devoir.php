<?php

namespace App\Models;

use App\Models\Specialite;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devoir extends Model
{
    use HasFactory;
    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function etudiants()
    {
        return $this->belongsToMany(User::class, 'user_devoir');
    }

}
