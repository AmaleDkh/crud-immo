<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;

// Get all real estate ads
Route::get('/', AnnonceController::class .'@index')->name('annonces.index');

// Send an ad form
Route::get('/annonces/create', AnnonceController::class . '@create')->name('annonces.create');

// Add an ad to the database
Route::post('/annonces', AnnonceController::class .'@store')->name('annonces.store');

// Get a real estate ad
Route::get('/annonces/{annonce}', AnnonceController::class .'@show')->name('annonces.show');

// Send an editing ad form
Route::get('/annonces/{annonce}/edit', AnnonceController::class .'@edit')->name('annonces.edit');

// Update an ad
Route::put('/annonces/{annonce}', AnnonceController::class .'@update')->name('annonces.update');

// Delete an ad
Route::delete('/annonces/{annonce}', AnnonceController::class .'@destroy')->name('annonces.destroy');
