<?php

namespace App\Models;

use App\Models\Devoir;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Professeur extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    public function devoir()
    {
        return $this->hasMany(Devoir::class);
    }
}
