<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;
    public function professeurs()
    {
        return $this->belongsToMany(Professeur::class, 'professeur_specialite');
    }

    public function users()
    {
        return $this->hasMany(Etudiant::class);
    }

    public function devoirs()
    {
        return $this->hasMany(Devoir::class);
    }
}
