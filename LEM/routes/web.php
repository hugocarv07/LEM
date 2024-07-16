<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

// Rotas existentes
Route::get('/', [EventController::class, 'index']);  
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); 
Route::get('/events/{id}', [EventController::class, 'show']); 
Route::post('/events', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

// Nova rota para o formulário de avaliação
Route::get('/evaluation-form', [EventController::class, 'showEvaluationForm'])->name('evaluation.form');
Route::post('/evaluate', [EventController::class, 'storeEvaluation'])->name('evaluation.store');


Route::get('/contact', function () {
    return view('contact');
});

// Middleware para verificar se o usuário é administrador
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/events', [AdminController::class, 'events'])->name('admin.events');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::get('/admin/events/{event}/edit', [AdminController::class, 'editEvent'])->name('admin.events.edit');
    Route::put('/admin/events/{event}', [AdminController::class, 'updateEvent'])->name('admin.events.update');
});