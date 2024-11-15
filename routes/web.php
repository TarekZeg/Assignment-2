<?php

use App\Http\Controllers\LeagueController;
use Illuminate\Support\Facades\Route;

Route::get('/league', [LeagueController::class, 'index']);
Route::get('/league/create', [LeagueController::class, 'create']);
Route::get('/league/about', [LeagueController::class, 'about']);
Route::get('/league/table', [LeagueController::class, 'table']);
Route::post('/league', [LeagueController::class, 'store']);
Route::get('/league/search', [LeagueController::class, 'search'])->name('league.search');
Route::get('/league/{id}', [LeagueController::class, 'show']);
Route::delete('/league/{id}', [LeagueController::class, 'delete'])->name('league.delete');
Route::get('league/{id}/edit', [LeagueController::class, 'edit'])->name('league.edit');

Route::put('league/{id}', [LeagueController::class, 'update'])->name('league.update');





