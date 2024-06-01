<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MechanicController;
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

Route::get('/', [LoginController::class, 'show'])->name('home');

//Routes authentification & Inscription
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/post-login', [LoginController::class, 'postLogin'])->name('login.post');
Route::get('/registration', [LoginController::class, 'inscription'])->name('register');
Route::post('/registration', [LoginController::class, 'postRegistration'])->name('register.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes pour les administrateurs mais a condition d'etre authentifie
Route::middleware(['auth'])->group(function () {
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/home', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('users', [AdminController::class, 'clients'])->name('admin.users');
        Route::get('ajout', [AdminController::class, 'ajout'])->name('AjouterClt');
        Route::post('ajout', [AdminController::class, 'storeClient'])->name('AjouterClt');
        Route::post("simple-excel/export", [AdminController::class, 'export'])->name('excel.export');
        Route::post('/import-clients', [AdminController::class, 'import'])->name('import');
        Route::get('/clients/{id}', [AdminController::class, 'show']);
        Route::get('/clients/{id}/edit', [AdminController::class, 'edit']);
        Route::delete('/clients/{id}', [AdminController::class, 'destroy'])->name('SupprimerClt');
        Route::get('modifier/{id}', [AdminController::class, 'modifier'])->name('ModifierClt');
        Route::post('modifier/{id}', [AdminController::class, 'updateClient'])->name('ModifierClt');
        Route::post('supprimer/{id}', [AdminController::class, 'deleteClient'])->name('SupprimerClt');
    });
});



// Routes pour les clients
Route::middleware(['auth'])->group(function () {

    Route::middleware('role:client')->prefix('client')->group(function () {
        Route::get('/home', [ClientController::class, 'dashboard'])->name('client.dashboard');
    });
});
// Routes pour les mécaniciens
Route::middleware(['auth'])->group(function () {
    Route::middleware('role:mecanicien')->prefix('mechanic')->group(function () {
        Route::get('/home', [MechanicController::class, 'dashboard'])->name('mec.dashboard');
    });
});


