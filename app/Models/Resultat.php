<?php

namespace App\Models;

use App\Models\Devoir;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    use HasFactory;

    public function devoir(){
       return $this->belongsTo(Devoir::class);
    }
    public function user(){
      return  $this->belongsTo(User::class);
    }
    public function specialite(){
      return  $this->belongsTo(Specialite::class);
    }
}
