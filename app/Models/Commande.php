<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'instruction',
    ];

     // Relation avec la table Client
     public function client()
     {
         return $this->belongsTo(Client::class);
     }

     // Relation avec la table Serveur
     public function serveur()
     {
         return $this->belongsTo(Serveur::class);
     }

     // Relation avec la table Cuisinier
     public function cuisinier()
     {
         return $this->belongsTo(Cuisinier::class);
     }

      // Relation avec la table plat
      public function plats()
      {
          return $this->belongsToMany(Plat::class, 'plat_commanders');
      }

      public function statut()
      {
        return $this->belongsTo(Statut::class);
      }
}