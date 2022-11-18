<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->middleware(['auth', 'verified'])->group(function () {

    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::resource('domains', DomainController::class);

    Route::resource('users', UserController::class);
});

Route::post('tenant/redirect', [DomainController::class, 'storeSubdomainRedirect'])->name('subdomain.redirect');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
