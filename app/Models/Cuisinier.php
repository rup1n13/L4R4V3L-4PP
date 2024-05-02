<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuisinier extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        // Ajoutez d'autres colonnes au besoin
    ];
     // Relation avec la table User
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     // Relation avec la table Commande
     public function commandes()
     {
         return $this->hasMany(Commande::class);
     }
}
