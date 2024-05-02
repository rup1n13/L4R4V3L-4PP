<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;
use App\MOdels\PlatCommander;

class ClientController extends Controller
{
    public function afficherPlat()
    {
        $plats = Plat::all();

        return view('client.plats.index', ['plats' => $plats]);
    }

    public function afficherCommande()
{

    //Acceder au client associer à cet utilisateur
    $client = Auth::user()->client;

    // Récupérer la dernière commande enregistrée par l'utilisateur
    $commande = Commande::where('client_id', $client->id)->latest()->first();

    // Vérifier si une commande a été trouvée
    if ($commande) {
        // Récupérer les détails des plats commandés pour cette commande
        $commandeId = $commande->id;
        $platsSelectionnes = $commande->plats;

        // Passer les détails de la commande à la vue
        return view('client.commandes.commande', ['platsSelectionnes' => $platsSelectionnes, 'commandeId'=>$commandeId]);
    } else {
        // Si aucune commande n'a été trouvée, rediriger l'utilisateur vers une autre page ou afficher un message d'erreur
        return view('erreur.404');
    }
}


    public function modifierCommande($commandeId)
    {
        $plats = Plat::all();

        $commande = Commande::findOrFail($commandeId);

        $platsSelectionnes = $commande->plats->pluck('id')->toArray();

        return view('client.commandes.modifier', ['plats' => $plats, 'platsSelectionnes' =>$platsSelectionnes, 'commandeId'=>$commande->id]);

    }

    public function storeCommande(Request $request){
        // Récupérer les plats sélectionnés depuis la requête
        $platsIds = $request->input('plats', []);
        // Créer une nouvelle commande
        $commande = new Commande();

        //Acceder au client associer à cet utilisateur
        $client = Auth::user()->client;

        $commande->client_id = $client->id;
        $commande->statut_id = 1; // ID du statut par défaut, à modifier en fonction de votre logique
        $commande->serveur_id = null; // ou laisser vide pour le moment
        $commande->cuisinier_id = null;
        $commande->save();

         // Ajouter chaque plat sélectionné à la table plat_commanders
        foreach ($platsIds as $platId) {
            // Ajouter un enregistrement pour chaque plat sélectionné dans la table plat_commanders
            PlatCommander::create([
                'plat_id' => $platId,
                'commande_id' => $commande->id,
            ]);
        }

        // Rediriger l'utilisateur vers une page de confirmation ou une autre action
        return redirect()->route('client.plat_commander');

    }

    public function updateCommande(Request $request, $commandeId)
    {
        // Récupérer la commande à mettre à jour
        $commande = Commande::findOrFail($commandeId);

        // Récupérer les plats sélectionnés depuis la requête
        $platsIds = $request->input('plats', []);

        // Supprimer tous les plats associés à cette commande dans la table plat_commanders
        PlatCommander::where('commande_id', $commandeId)->delete();

        // Ajouter les nouveaux plats sélectionnés à la commande
        foreach ($platsIds as $platId) {
            // Ajouter un enregistrement pour chaque plat sélectionné dans la table plat_commanders
            PlatCommander::create([
                'plat_id' => $platId,
                'commande_id' => $commandeId,
            ]);
        }

        // Rediriger l'utilisateur vers une page de confirmation ou une autre action
        return redirect()->route('client.plat_commander')->with('success', 'Commande mise à jour avec succès.');
    }

    public function deleteCommande($commandeId)
    {
        // Récupérer la commande à supprimer
        $commande = Commande::findOrFail($commandeId);

        // Supprimer tous les plats associés à cette commande dans la table plat_commanders
        PlatCommander::where('commande_id', $commandeId)->delete();

        // Supprimer la commande elle-même
        $commande->delete();

        // Rediriger l'utilisateur vers une page de confirmation ou une autre action
        return redirect()->route('client.plat_commander')->with('success', 'Commande supprimée avec succès.');
    }
}