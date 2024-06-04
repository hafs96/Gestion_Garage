<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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

// Route pour afficher le formulaire de demande de réinitialisation du mot de passe
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Route pour afficher le formulaire de réinitialisation du mot de passe
Route::get('/reset-password/{token}/{email}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

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
        Route::post("simple-excel/export", [AdminController::class, 'export'])->name('excel.export');
        Route::post('/import-clients', [AdminController::class, 'import'])->name('import');
        Route::get('/ShowClient/{id}', [AdminController::class, 'show'])->name('Modifclt');
        Route::put('/EditClient/{id}', [AdminController::class, 'editClient'])->name('updateClient');
        Route::delete('/DeleteClient/{id}', [AdminController::class, 'deleteClient'])->name('DeleteClient');
        Route::post('ajouter-client', [AdminController::class, 'ajouterClient'])->name('ajouterClient');
        Route::get('/vehicules', [AdminController::class, 'vehicules'])->name('admin.vehicules');
        Route::get('/vehicules/{id}/edit', [AdminController::class, 'editVehicule'])->name('editvehicule');
        Route::put('/vehicules/{id}', [AdminController::class, 'updateVehicule'])->name('updatevehicule');
        Route::delete('/vehicules/{id}', [AdminController::class, 'destroyVehicule'])->name('Vdestroy');
        Route::get('/addvehicule', [AdminController::class, 'addV'])->name('addV');
        Route::post('/ajouter-vehicule', [AdminController::class, 'storeV'])->name('ajouterVehicule');



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


