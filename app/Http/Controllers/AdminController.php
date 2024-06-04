<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\client;
use App\Models\Vehicule;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Spatie\SimpleExcel\SimpleExcelWriter;


class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('layouts.master');
    }

    //Recuperer La liste des clients/utilisateurs
    public function clients()
    {
        $clients = User::paginate(5);
        return view('Admin.Listeclient', compact('clients'));
    }
    //Exportation
    public function export (Request $request) {

    	// 1. Validation des informations du formulaire
    	$this->validate($request, [
    		'name' => 'bail|required|string',
            'extension' => 'bail|string|in:xlsx,csv',
    	]);
        $default_extension = 'xlsx';
        $extension = $request->filled('extension') ? $request->extension : $default_extension;
    	// 2. Le nom du fichier avec l'extension : .xlsx ou .csv
    	$file_name = $request->name.".". strtolower($extension);
    	// 3. On récupère données de la table "clients"
    	$clients = User::select("Nom","Prenom","username","Adresse","email","NumeroTelephone","role")->get();
    	// 4. $writer : Objet Spatie\SimpleExcel\SimpleExcelWriter
    	$writer = SimpleExcelWriter::streamDownload($file_name);
 		// 5. On insère toutes les lignes au fichier Excel $file_name
    	$writer->addRows($clients->toArray());
        // 6. Lancer le téléchargement du fichier
        $writer->toBrowser();

    }

    //Importation
    public function import (Request $request) {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv',
        ]);

        $file = $request->file('file');
        Excel::import(new client, $request->file('file'));

        return redirect()->back()->with('success', 'Clients imported successfully.');

    }
    //Affichage d'un client
    public function show($id)
    {
        $client = User::find($id);

        if ($client) {
            return response()->json(['client' => $client]);
        } else {
            return response()->json(['error' => 'Client not found'], 404);
        }
    }
    //Modification de client
    public function editClient(Request $request, $id)
    {
        $client = User::find($id);
        $client->Nom = $request->Nom;
        $client->Prenom = $request->Prenom;
        $client->username = $request->username;
        $client->Adresse = $request->Adresse;
        $client->email = $request->email;
        $client->NumeroTelephone = $request->NumeroTelephone;
        $client->role = $request->role;
        $client->save();
        return response()->json(['success' => true]);
    }
    //Supprision d'un client
    public function deleteClient($id)
{
    $client = User::find($id);
    if ($client) {
        $client->delete();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['error' => 'Client not found'], 404);
    }
}
    //Ajouter Client
    public function ajouterClient(Request $request)
{
    // Validation des données du formulaire
    $validatedData = $request->validate([
        'username' => 'required',
        'Nom' => 'required',
        'Prenom' => 'required',
        'Adresse' => 'required',
        'NumeroTelephone' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|in:client,admin,mecanicien',
    ]);

    // Création d'un nouveau client
    $client = new User();
    $client->username = $request->username;
    $client->Nom = $request->Nom;
    $client->Prenom = $request->Prenom;
    $client->Adresse = $request->Adresse;
    $client->NumeroTelephone = $request->NumeroTelephone;
    $client->email = $request->email;
    $client->password = bcrypt($request->password);
    $client->role = $request->role;
    $client->save();

    // Rediriger l'utilisateur vers une page de confirmation ou afficher un message de succès
    return response()->json(['success' => true]);
}
    //Gestion des vehicules
        //affichage
        public function vehicules()
        {
            $vehicules = Vehicule::paginate(6);
            $clients = User::where('role', 'client')->with('clients')->get();
            return view('admin.vehicules', compact('vehicules','clients'));
        }
        // Modification
        public function editVehicule($id)
        {
            $vehicule = Vehicule::findOrFail($id);
            return view('admin.EditV', compact('vehicule'));
        }

        public function updateVehicule(Request $request, $id)
        {
            $vehicule = Vehicule::findOrFail($id);

            $validatedData = $request->validate([
                'brand' => 'required',
                'model' => 'required',
                'fuel_type' => 'required',
                'registration_number' => 'required|unique:vehicules,registration_number,'.$vehicule->id,
            ]);

            $validatedData['fuel_type'] = Arr::random(['Essence', 'Diesel', 'Electrique', 'Hybride']);

            $vehicule->update($validatedData);

            return redirect()->route('admin.vehicules')->with('success', 'Véhicule mis à jour avec succès.');
        }
        //La suppresion
        public function destroyVehicule($id)
        {
            $vehicule = Vehicule::findOrFail($id);
            $vehicule->delete();
            return redirect()->route('admin.vehicules')->with('success', 'Véhicule supprimé avec succès.');
        }
        //Ajout de vehicule
        public function addV()
        {
            $clients = User::where('role', 'client')->with('clients')->get();
            return view('admin.ajoutV',compact('clients'));
        }
        public function storeV(Request $request)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'fuel_type' => 'required',
            'registration_number' => 'required|unique:vehicules,registration_number',
            'client_id' => 'required|exists:clients,id',
        ]);

        Vehicule::create($validatedData);
        return redirect()->route('admin.vehicules')->with('success', 'Véhicule ajouté avec succès.');
    }







}



