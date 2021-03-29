<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;

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
//     return view('pages.front-office.welcome');
// })->name('accueil');

// Route::get('/procedure', function () {
//     return view('pages.front-office.procedure');
// })->name('procedure');

Route::get('/', [MainController::class, 'afficheAccueil'])->name('accueil');

Route::get('procedure/{param}', [MainController::class, 'afficheProcedure'])->name('procedure');

Route::get('ajouter-produit', [MainController::class, 'ajoutProduit'])->name('a.produit');

Route::get('ajout2', [MainController::class, 'ajoutProduitEncore'])->name('a.p');

Route::get('listproduit', [MainController::class, 'getList'])->name('a.liste');

Route::get('modification/{id}', [MainController::class, 'modifierProduit']);

Route::get('supprimer/{id}', [MainController::class, 'supprimerProduit'])->name('deleteListe');

Route::get('ajoutercommande/{id}', [MainController::class, 'ajoutercommande'])->name('ajoutercommande');

Route::get('supprime/{id}', [MainController::class, 'supCommande'])->name('deleteCommande');

Route::get('produits/ajouter', [MainController::class, 'ajouterProduit'])->name('produit.ajout');

Route::post('produits/enregistrer', [MainController::class, 'enregisterProduit'])->name('produit.enregister');

// Route::get('produits/modifier/{id}', [MainController::class, 'editProduit'])->name('produit.modifier');
Route::get('produits/modifier/{produit}', [ProduitController::class, 'edit'])->name('produit.modifier');

Route::put('produits/update/{id}', [MainController::class, 'updateProduit'])->name('produit.update');

Route::resource('produit', ProduitController::class);

Route::get('export-excel', [MainController::class, 'excelExport'])->name('excel.export');

Route::get('/wyuzer@kdpp', function () {
    return view('pages.front-office.login');
})->name('login');