<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function calculerSousTotal($commandeId)
    {
        // Récupérer la commande à partir de son identifiant
        $commande = Commande::findOrFail($commandeId);

        // Initialiser le sous-total à 0
        $sousTotal = 0;

        // Parcourir les plats de la commande
        foreach ($commande->plats as $plat) {
            // Ajouter le prix du plat multiplié par sa quantité au sous-total
            $sousTotal += $plat->prix * $plat->pivot->quantite;
        }

        // Retourner le sous-total calculé
        return $sousTotal;
    }
}