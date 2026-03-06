<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('about', function () {
    return '<h1>a propos de nous</h1>
            <p>nous somme une equipe laravel !</p>';
});

Route::get('/contact', function () {
    return '<h1>contactez-nous</h1>
            <p>email: ranim@laravel.com</p>';
});

Route::get('/utilisateur/{nom}', function ($nom) {
    return "<h1>profil de $nom</h1>
            <p>bienvenue sur votre page!</p>";
});

Route::get('/article/{id}/{titre}', function ($id, $titre) {
    return "<h1>article #$id : $titre</h1>";
});

Route::get('/produit/{id}', function ($id) {
    return "<h1>produit #$id</h1>";
})->where('id', '[0-9]+');

Route::get("/sum/{a}/{b}", function ($a, $b) {
    $sum = $a + $b;
    return "La somme de $a et $b est : $sum";
});

Route::get("/age/{age}", function ($age) {
    if ($age >= 18) {
        return "Vous êtes majeur.";
    } else {
        return "Vous êtes mineur.";
    }
});

Route::get('/equipe/{membre?}', function ($membre = null) {

    $equipe = [
        "khalil",
        "aziz",
        "ranim",
        "yasmine"
    ];

    if ($membre === null) {
        return "Toute l'équipe";
    }

    if (in_array($membre, $equipe)) {
        return "Membre de l'équipe : " . $membre;
    }

    return "Ce membre n'existe pas";
});
