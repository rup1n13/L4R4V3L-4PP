<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CuisinierController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function(){return view('first_page');});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {return view('home');})->name('home');

    Route::resource('users', UserController::class);

    Route::resource('plats', PlatController::class);

    Route::get('/Clients/plats', [ClientController::class ,'afficherPlat'])->name('client.plats');

    Route::post('/Clients/commande/store', [ClientController::class, 'storeCommande'])->name('client.commande.store');

    Route::get('/Clients/commande', [ClientController::class ,'afficherCommande'])->name('client.plat_commander');

    Route::get('/Clients/modifier_commande/{commandeId}', [ClientController::class ,'modifierCommande'])->name('client.modifier_Commandes');

    Route::post('/Clients/commande/update/{commandeId}', [ClientController::class ,'updateCommande'])->name('client.commande.update');

    Route::delete('/Clients/commande/{commandeId}', [ClientController::class, 'deleteCommande'])->name('client.commande.delete');


    Route::get('/cuisine/voir_commande', [CuisinierController::class, 'voir_commande'])->name('cuisinier.voir_commande');
    Route::post('/cuisine/update_status/{commande_id}', [CuisinierController::class, 'update_commande_statut'])->name('update_commande_statut');

});

Route::middleware(['auth'])->group(function () {
    Route::post('/two-factor-challenge', [TwoFactorAuthenticationController::class, 'store'])->name('two-factor.login');
    Route::post('/two-factor-authentication', [TwoFactorAuthenticationController::class, 'enable'])->name('two-factor.enable');
    Route::post('/two-factor-authentication/disable', [TwoFactorAuthenticationController::class, 'disable'])->name('two-factor.disable');
});