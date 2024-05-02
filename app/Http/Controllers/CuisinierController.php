<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Commande;
use App\Models\PlatCommander;
use App\Models\Plat;
use App\Models\Statut;

class CuisinierController extends Controller
{
    public function voir_commande()
{
    // $platsParCommande = PlatCommander::select('commande_id', DB::raw('group_concat(plat_id) as plats_ids'))
    // ->groupBy('commande_id')
    // ->get();

    $commandes = Commande::with('plats', 'client.user', 'statut')->get();

    $statuts = Statut::all();


    return view('cuisinier.voir_commande', ['commandes' => $commandes, 'statuts'=>$statuts]);

}

public function update_commande_statut(Request $request, $commande_id)
    {
        $commande = Commande::findOrFail($commande_id);
        $commande->statut_id = $request->input('statut_id');
        $commande->save();

        return redirect()->back()->with('success', 'Statut de la commande mis à jour avec succès.');
    }
}