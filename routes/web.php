<?php

use App\Http\Controllers\Adm\{SuporteController};
use App\Http\Controllers\Admin\{ReplySupportController, SupportController};
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Testes\TesteController;
use Illuminate\Support\Facades\Route;

Route::delete('/suporte/{id}', [SuporteController::class, 'delete'])->name('suporte.delete');
Route::put('/suporte/{id}', [SuporteController::class, 'update'])->name('suporte.update');
Route::get('/suporte/{id}/edit', [SuporteController::class, 'edit'])->name('suporte.edit');
Route::get('/suporte/create', [SuporteController::class, 'create'])->name('suporte.create');
Route::get('/suporte/{id}', [SuporteController::class, 'show'])->name('suporte.show');
Route::get('/suporte', [SuporteController::class, 'index'])->name('suporte.index');
Route::post('/suporte', [SuporteController::class, 'store'])->name('suporte.store');

Route::get('/contato', [SiteController::class, 'contact']);

Route::get('/teste', [TesteController::class, 'teste']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/supports/{id}/replies', [ReplySupportController::class, 'store'])->name('replies.store');
    Route::delete('/supports/{id}/replies/{reply}', [ReplySupportController::class, 'destroy'])->name('replies.destroy');
    Route::get('/supports/{id}/replies', [ReplySupportController::class, 'index'])->name('replies.index');

    // Route::resource('/supports', SupportController::class);
    Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
    Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
    Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
    Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
    Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
    Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
});

require __DIR__ . '/auth.php';
