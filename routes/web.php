<?php

use App\Http\Controllers\LeagueController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/league', [LeagueController::class, 'index']);
Route::get('/league/create', [LeagueController::class, 'create'])->middleware(['auth', 'can:edit']);
Route::get('/league/about', [LeagueController::class, 'about']);
Route::get('/league/table', [LeagueController::class, 'table']);
Route::post('/league', [LeagueController::class, 'store']);
Route::get('/league/search', [LeagueController::class, 'search'])->name('league.search');
Route::get('/league/{id}', [LeagueController::class, 'show'])->middleware('auth');
Route::delete('/league/{id}', [LeagueController::class, 'delete'])->name('league.delete')->middleware(['auth', 'can:edit']);
Route::get('league/{id}/edit', [LeagueController::class, 'edit'])->name('league.edit')->middleware(['auth', 'can:edit']);
Route::put('league/{id}', [LeagueController::class, 'update'])->name('league.update');

Route::get('/players/stats', [PlayerController::class, 'stats']);
Route::post('/players', [PlayerController::class, 'store']);
Route::get('/players/create', [PlayerController::class, 'create'])->middleware('auth');
Route::get('/players/search', [PlayerController::class, 'search'])->name('players.search');
Route::get('/players/{id}', [PlayerController::class, 'show'])->middleware('auth');
Route::delete('/players/{id}', [PlayerController::class, 'delete'])->name('players.delete');
Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('players.edit');
Route::put('/players/{id}', [PlayerController::class, 'update'])->name('players.update');
Route::get('/league/{id}/players', [LeagueController::class, 'teamPlayers'])->name('league.teamPlayers');



Route::get('/login', [AuthController::class, 'index'])->name("login");;
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/signup', function () {
    return view('auth.signup');
});
Route::post('/signup', [AuthController::class, 'register']);

Route::get('/auth/user', [AuthController::class, 'user'])->middleware('auth');
Route::get('/signup', [AuthController::class, 'signup']);
Route::get("/auth/role", [AuthController::class, 'role'])->middleware(['auth', 'can:edit']);

Route::put('/users/{user}/update-role', [AuthController::class, 'updateRole'])->name('updateRole')->middleware(['auth', 'can:edit']);
Route::get('/auth/search', [AuthController::class, 'searchUser'])->name('auth.search');

Route::get('/auth/search-suggestions', [AuthController::class, 'searchSuggestions'])->name('auth.search.suggestions');

