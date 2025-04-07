<?php

namespace App\Models;

use App\Models\Professeur;
use App\Models\Resultat;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devoir extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre','professeur_id','document','content','cour','specialite_id', 'description', 'date_debut', 'date_fin'
    ];
    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_devoir');
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class);
    }

    public function resultat()
    {
        return $this->hasMany(Resultat::class);
    }
}
