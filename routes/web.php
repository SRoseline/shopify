<?php

use App\Mail\ProduitAjoute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Notifications\ModificationProduit;
use Symfony\Component\Routing\Route as SymfonyRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// la page d'accueil n'es pas protegé par un middleware
Route::get('/',[MainController::class, "acceuil"])->name('accueil');

//Creer un middleware de Route et prefixer l'index avec admin
Route::middleware(["auth","isAdmin"])->prefix("admin")->group(function () {
    //Route::get('/',[MainController::class, "acceuil"])->name('accueil');
    Route::resource("produits",ProduitController::class);
    Route::get("export-produits", [MainController::class,"exportProduits"])->name('export');
});

Route::get("list-produits");[ProduitController::class,"index"];

//Creer les différentes routes 
Route::get("ajouter-produit",[MainController::class,"ajouterProduit"] );
Route::get("ajouter-produit2",[MainController::class,"ajouterProduit2"] );
Route::get("update-produit/{produit}",[MainController::class, "updateProduit"]);
Route::get("update-produit2/{id}",[MainController::class, "updateProduit2"]);
Route::get("suppression-produit1}",[MainController::class, "supprimerProduit1"]);
Route::get("suppression-produit/{id}",[MainController::class, "supprimerProduit"]);
Route::get("create-category", [MainController::class, "createCategory"]);
Route::get("get-produit/{produit}",[MainController::class, "getProduit"]);
Route::get("commander_produit",[MainController::class,"commanderProduit"]);
Route::get("test-collection",[MainController::class,"collection"]);
Route::get("test-mail", function(){
    return new ProduitAjoute;
});

Route::get("test-modification", function(){
    return new ModificationProduit;
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//routes de l'autentification
require __DIR__.'/auth.php';


