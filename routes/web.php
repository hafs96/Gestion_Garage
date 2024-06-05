<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\NotificationController;
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
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('pieces', PieceController::class);
    Route::get('/liste', [PieceController::class, 'index'])->name('listepiece');
    Route::get('/pieces/create', [PieceController::class, 'create'])->name('pieces.create');
    Route::post('/pieces', [PieceController::class, 'store'])->name('pieces.store');
    Route::get('/pieces/{piece}/edit', [PieceController::class, 'edit'])->name('pieces.edit');
    Route::put('/pieces/{piece}', [PieceController::class, 'update'])->name('pieces.update');
    Route::delete('/pieces/{piece}', [PieceController::class, 'destroy'])->name('pieces.destroy');
    Route::get('/notifications/low-stock', [NotificationController::class, 'lowStockNotifications'])->name('notifications.lowStock');
    Route::post('/pieces/{id}/replenish', [NotificationController::class, 'replenishStock'])->name('pieces.replenish');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/lrendezvous', [RendezvousController::class, 'index'])->name('RDVindex');
    Route::get('/rendezvous/create', [RendezvousController::class, 'create'])->name('rdvcreate');
    Route::post('/rendezvous', [RendezvousController::class, 'store'])->name('rendezvous.store');
    Route::get('/rendezvous/{rendezvous}', [RendezvousController::class, 'show'])->name('rendezvous.show');
    Route::get('/rendezvous/{rendezvous}/edit', [RendezvousController::class, 'edit'])->name('rendezvous.edit');
    Route::put('/rendezvous/{rendezvous}', [RendezvousController::class, 'update'])->name('rendezvous.update');
    Route::delete('/rendezvous/{rendezvous}', [RendezvousController::class, 'destroy'])->name('rendezvous.destroy');
    Route::resource('factures', FactureController::class);
    Route::get('factures/{facture}/pdf', [FactureController::class, 'downloadPDF'])->name('factures.pdf');
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


