<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plat;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlatController extends Controller
{

    public function show($id)
{
    $plat = Plat::findOrFail($id);
    return view('plats.show', ['plat' => $plat]);
}

    public function index()
    {
        $plats = Plat::all();
        return view('plats.index', ['plats' => $plats]);
    }

    public function create()
    {
        return view('plats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajout de la validation pour l'image
        ]);

        $admin = Admin::where('user_id', Auth::user()->id )->first();

        $plat = new Plat();

        $plat->nom = $request->input('nom');
        $plat->description = $request->input('description');
        $plat->prix = $request->input('prix');
        $plat->admin_id = $admin->id;

        // Traitement de l'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/plats'), $imageName);
            $plat->image = $imageName;
        }

        $plat->save();

        session()->flash('success', 'Plat créé avec succès');
        return redirect()->route('plats.index');
    }

    public function edit($id)
    {
        $plat = Plat::findOrFail($id);
        return view('plats.edit', ['plat' => $plat]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajout de la validation pour l'image
        ]);

        $plat = Plat::findOrFail($id);
        $plat->nom = $request->input('nom');
        $plat->description = $request->input('description');
        $plat->prix = $request->input('prix');

        // Traitement de la nouvelle image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/plats'), $imageName);
            $plat->image = $imageName;
        }

        $plat->save();

        session()->flash('success', 'Plat modifié avec succès');
        return redirect()->route('plats.index');
    }

    public function destroy($id)
    {
        $plat = Plat::findOrFail($id);

    // Supprimer l'image associée du stockage si elle existe
    if ($plat->image) {
        Storage::delete('public/images/plats/' . $plat->image);
    }

    // Supprimer le plat de la base de données
    $plat->delete();

    // Rediriger avec un message de succès
    return redirect()->route('plats.index')->with('success', 'Plat supprimé avec succès.');

    }
}