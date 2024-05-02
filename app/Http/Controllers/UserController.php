<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use App\Models\Cuisinier;
use App\Models\Serveur;
use App\Models\Client;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', [ 'users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' =>'required|string|max:255',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|min:8',
        'role' => 'required|string|in:admin,cuisinier,serveur','address' => 'nullable|string|max:255', // Validation pour l'adresse
        'telephone' => 'nullable|string|max:11',
        ]);

        user::create($request->all());

        // Création de l'utilisateur associé au rôle
    if ($request->input('role') == 'admin') {
        Admin::create([
            'user_id' => $user->id,

        ]);
    } elseif ($request->input('role')  == 'cuisinier') {
        Cuisinier::create([
            'user_id' => $user->id,

    ]);
    } elseif ($request->input('role')  == 'serveur') {
        Serveur::create([
            'user_id' => $user->id,

        ]);
    } elseif ($request->input('role')  == 'client') {
        Client::create([
            'user_id' => $user->id,

        ]);
    }

    session()->flash('success', 'Utilisateur créé avec succès');
    return redirect()->route('users.index');


        session()->flash('success', 'Universite modifié avec succès');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' =>'required|string|max:255',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|min:8',
        'role' => 'required|string|in:admin,cuisinier,serveur','address' => 'nullable|string|max:255', // Validation pour l'adresse
        'telephone' => 'nullable|string|max:11',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        switch ($user->role) {
            case 'admin':
                // Delete associated admin record
                Admin::where('user_id', $user->id)->delete();
                break;

            case 'cuisinier':
                // Delete associated cuisinier record
                Cuisinier::where('user_id', $user->id)->delete();
                break;

            case 'serveur':
                // Delete associated serveur record
                Serveur::where('user_id', $user->id)->delete();
                break;

            case 'client':
                // Delete associated client record
                Client::where('user_id', $user->id)->delete();
                break;


            default:
                # code...
                break;
        }




        // Finally, delete the user
        $user->delete();

        return redirect()->route('users.index');
    }
}
