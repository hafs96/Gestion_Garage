<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Piece;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Vehicule;
use App\Models\Mecanique;
use App\Models\Reparation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(15)->create();
        $clients = User::where('role', 'client')->get();
        foreach ($clients as $client) {
            $clientModel = Client::factory()->create(['user_id' => $client->id]);
            // Créer des véhicules pour chaque client
            Vehicule::factory()->count(3)->create(['client_id' => $clientModel->id]);
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
            Reparation::factory()->count(2)->create([
                'vehicule_id' => $vehicule->id,
                'mecanique_id' => Mecanique::inRandomOrder()->first()->id,
            ]);
        }

        // Créer des factures pour les réparations
        $reparations = Reparation::all();
        foreach ($reparations as $reparation) {
            Facture::factory()->create(['reparation_id' => $reparation->id]);
        }
    }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

