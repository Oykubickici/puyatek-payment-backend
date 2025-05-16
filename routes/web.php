<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});
Route::get('/message', function () {
    return response()->json([
        'message' => 'Merhaba React!',
    ]);
});
Route::post('/kayit-ol', [PaymentController::class, 'register']);



Route::get('/{any}', function () {
    return view('app'); 
})->where('any', '.*');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
