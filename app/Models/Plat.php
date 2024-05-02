<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'telephone',
    ];

    public function admin(){
        return $this->belongsTo(admin::class);
    }

     // Relation avec la table Commande
     public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'plat_commanders');
    }
}