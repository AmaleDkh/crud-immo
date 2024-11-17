<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;

// Récupérer toutes les annonces
Route::get('/', AnnonceController::class .'@index')->name('annonces.index');

// Renvoyer un formulaire d'ajout d'annonce
Route::get('/annonces/create', AnnonceController::class . '@create')->name('annonces.create');

// Ajouter une annonce à la base de données
Route::post('/annonces', AnnonceController::class .'@store')->name('annonces.store');

// Récupérer une annonce
Route::get('/annonces/{annonce}', AnnonceController::class .'@show')->name('annonces.show');

// Renvoyer un formulaire d'édition d'annonce
Route::get('/annonces/{annonce}/edit', AnnonceController::class .'@edit')->name('annonces.edit');

// Mettre à jour une annonce
Route::put('/annonces/{annonce}', AnnonceController::class .'@update')->name('annonces.update');

// Supprimer une annonce
Route::delete('/annonces/{annonce}', AnnonceController::class .'@destroy')->name('annonces.destroy');
