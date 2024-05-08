<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('auth/login');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('register','register')->name('register');
    Route::get('redirect_login','redirect_login')->name('redirect_login');
    Route::post('registerSave','registerSave')->name('registerSave');
    Route::get('logout','Deconnexion')->name('logout');
});

Route::get('/connexion', App\Http\Controllers\AuthController::class . '@redirect_login')->name('connexion');
// Route::post('loginAction', 'loginAction')->name('login.action');
Route::post('/loginAction', App\Http\Controllers\AuthController::class . '@loginAction')->name('login.action');

// before
Route::post('/login', App\Http\Controllers\AuthController::class . '@login');

// $session = session();
// if(!empty($session->get('idp'))){

// Lien router
Route::get('/Dashboard', App\Http\Controllers\Controller::class . '@dashboard')->name('dashboard');
Route::get('/Statistique', App\Http\Controllers\Controller::class . '@statistique')->name('statistique');
Route::get('/Acceuille', App\Http\Controllers\Controller::class . '@acceuille')->name('accueille');
Route::get('/Form', App\Http\Controllers\Controller::class . '@formulaire')->name('form');
Route::get('/Table', App\Http\Controllers\Controller::class . '@tableau')->name('tableau');
Route::get('/Uielement', App\Http\Controllers\Controller::class . '@uielements')->name('uielements');
Route::get('/Tabpanel', App\Http\Controllers\Controller::class . '@tabpanel')->name('tabpanel');
Route::get('/Import_Csv', App\Http\Controllers\Controller::class . '@Importcsv')->name('Importcsv');
// Route::get('/Patient', App\Http\Controllers\Controller::class . '@patient')->name('patient');

Route::get('/Empty', App\Http\Controllers\Controller::class . '@empty')->name('empty');

// choix multi-lingues
Route::get('/language',App\Http\Controllers\Controller::class.'@language')->name('language');
// stat GRAPH
Route::get('/stat',App\Http\Controllers\ServiceController::class.'@stat')->name('stat');
// liste seance avec pagination
Route::get('/liste_seance',App\Http\Controllers\ServiceController::class.'@pagination_seance')->name('liste_seance');
// update seance
Route::get('/update_seance',App\Http\Controllers\ServiceController::class.'@update_seance')->name('update_seance');
// Update Valid seance
Route::get('/update_Valid_seance',App\Http\Controllers\ServiceController::class.'@update_Valid_seance')->name('update_Valid_seance');

// Service
Route::get('/Annulation_Billet', App\Http\Controllers\ServiceController::class . '@Annulation_Billet')->name('Annulation_Billet');
Route::get('/achat_Billet', App\Http\Controllers\ServiceController::class . '@achat_Billet')->name('achat_Billet');
Route::get('/update_service', App\Http\Controllers\ServiceController::class . '@edit')->name('update_service');
// Ajout Seance
Route::post('/Ajout_seance', App\Http\Controllers\ServiceController::class . '@Ajout_seance')->name('Ajout_seance');

// valider update
Route::get('/update_ok', App\Http\Controllers\ServiceController::class . '@update')->name('update_ok');
// delete
Route::get('/delete_service', App\Http\Controllers\ServiceController::class . '@delete')->name('delete_service');
// delete_Valid_seance
Route::get('/delete_Valid_seance', App\Http\Controllers\ServiceController::class . '@delete_Valid_seance')->name('delete_Valid_seance');

// billet
Route::get('/valider_billet', App\Http\Controllers\ServiceController::class . '@valider_billet')->name('valider_billet');

// Filtre Liste Seance
Route::get('/filtre_Liste_Seance', App\Http\Controllers\ServiceController::class . '@filtre_Liste_Seance')->name('filtre_Liste_Seance');
// Filtre Update Seance
Route::get('/filtre_update_seance', App\Http\Controllers\ServiceController::class . '@filtre_update_seance')->name('filtre_update_seance');

// choisir diffusion
Route::get('/choisir_diffusion', App\Http\Controllers\ServiceController::class . '@choisir_diffusion')->name('choisir_diffusion');
// apres choix place
Route::get('/valider_place', App\Http\Controllers\ServiceController::class . '@valider_place')->name('valider_place');
// valider info client
Route::get('/valider_info_client', App\Http\Controllers\ServiceController::class . '@valider_info_client')->name('valider_info_client');

Route::post('/upload_csv',App\Http\Controllers\ServiceController::class.'@upload_csv')->name('upload_csv');
// }

// Route::middleware('auth')->group(function(){
//     Route::get('deconnexion',function(){
//         return view('login');
//     })->name('deconnexion');
// });
