<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Admin;
use App\Models\Serveur;
use App\Models\Client;
use App\Models\Cuisinier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'role' => ['required', 'string'],
            //'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'password' => Hash::make($input['password']),
        ]);

        switch ($input['role']) {
            case 'admin':
                $admin = new Admin();
                $admin->user_id= $user->id;
                $admin->save();
                break;

            case 'serveur':
                $serveur = new Serveur();
                $serveur->user_id= $user->id;
                $serveur->save();
                break;

            case 'client':
                $client = new Client();
                $client->user_id= $user->id;
                $client->save();
                break;

            case 'cuisnier':
                $cuisinier = new Cuisinier();
                $cuisinier->user_id= $user->id;
                $cuisinier->save();
                break;
        }

        return $user;
    }
}