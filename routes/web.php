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


Route::get('/blog', function (Request $request) {
    return [

        "name" => $request->input('name','Doe'), // retourne le nom, s'il n'y a pas de nom en entrer renvoie la valeur par défaut
        "Article" => "article 1",
        "link" => route('blog.show', ['slug' => 'article', 'id' => 12 ]),
    ];
})->name('blog.index');

Route::get( '/blog/{slug}-{id}', function (string $slug, string $id) { 
    // les {} permettes de dire qu'on aura un parametre dynamique
    // il est tout à fait possible d'ajouter le $request comme 3e parametre et de l'utiliser

    return [
        "slug" => $slug,
        "id" => $id
    ];
    // on peut ajouter des methodes suplémentaires sur des routes
    // where() :: est une methode permettant de spécifier des contrainte sur un paramètre
})->where([
    'id' => '[0-9]+', // the + to specify that they are only a numerical values
    'slug' => '[a-z0-9\-]+' // to specify that we could have characters between a and z, 0 and 9 and also -. and the + to specify thay it could be repeated more than once
])->name('blog.show');