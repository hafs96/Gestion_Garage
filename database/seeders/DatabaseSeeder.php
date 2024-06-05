<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Mecanique;
use App\Models\rendezvous;
use App\Models\Facture;
use App\Models\Piece;
use App\Models\Reparation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // Créer des utilisateurs
       User::factory()->count(15)->create();

       // Créer des clients et associer des utilisateurs avec le rôle 'client'
       $clients = User::where('role', 'client')->get();
       foreach ($clients as $client) {
           $clientModel = Client::factory()->create(['user_id' => $client->id]);

           // Créer des véhicules pour chaque client
           $vehicules = Vehicule::factory()->count(3)->create(['client_id' => $clientModel->id]);

           // Créer des rendez-vous pour chaque client
           foreach ($vehicules as $vehicule) {
               for ($i = 0; $i < 5; $i++) {
                   $mecanicien = Mecanique::inRandomOrder()->first();
                   if ($mecanicien) {
                       rendezvous::factory()->create([
                           'client_id' => $clientModel->id,
                           'mec_id' => $mecanicien->id,
                       ]);
                   }
               }
           }

           // Créer des factures pour chaque client
           Facture::factory()->count(3)->create(['client_id' => $clientModel->id]);
       }

       // Créer des mécaniciens et associer des utilisateurs avec le rôle 'mecanicien'
       $mecaniciens = User::where('role', 'mecanicien')->get();
       foreach ($mecaniciens as $mecanicien) {
           Mecanique::factory()->create(['user_id' => $mecanicien->id]);
       }

       // Créer des pièces
       Piece::factory()->count(50)->create();

       // Créer des réparations et les associer à des véhicules et mécaniciens
       $vehicules = Vehicule::all();
       foreach ($vehicules as $vehicule) {
           for ($i = 0; $i < 2; $i++) {
               $mecanicien = Mecanique::inRandomOrder()->first();
               if ($mecanicien) {
                   $reparation = Reparation::factory()->create([
                       'vehicule_id' => $vehicule->id,
                       'mecanique_id' => $mecanicien->id,
                   ]);

                   // Créer une facture pour chaque réparation
                   Facture::factory()->create([
                       'reparation_id' => $reparation->id,
                       'client_id' => $vehicule->client_id,
                   ]);
               }
           }
       }

       // Créer des factures pour les réparations qui n'ont pas encore de facture
       $reparations = Reparation::all();
       foreach ($reparations as $reparation) {
           if (!$reparation->facture) {
               Facture::factory()->create([
                   'reparation_id' => $reparation->id,
                   'client_id' => $reparation->vehicule->client_id,
               ]);
           }
       }
   }
}
