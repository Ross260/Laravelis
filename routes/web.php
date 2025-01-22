<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { // lorsque j'accede à la page racine, répond par cette fonction qui retourne la vue welcome
    return view('welcome');
});

Route::get('/bloc', function (Request $request) {
    return [
        // "name" => $request->path(), // retourne l'url courante
        // "name" => $request->url(), // retourne l'url actuel
        // "name" => $request->all(), // retourne l'url courante
        "name" => $request->input('name','Doe'), // retourne le nom, s'il n'y a pas de nom en entrer renvoie la valeur par défaut
        "Article" => "article 1",
    ];
});