<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatCommander extends Model
{
    use HasFactory;

    protected $fillable = [
        'plat_id',
        'commande_id'// Ajoutez les autres champs au besoin
    ];

    
}
