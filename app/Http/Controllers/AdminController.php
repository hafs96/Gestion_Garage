<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\client;
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

    public function show($id)
{
    $client = User::find($id);
    return response()->json($client);
}

public function edit($id)
{
    $client = User::find($id);
    return response()->json($client);
}

public function destroy($id)
{
    $client = User::find($id);
    $client->delete();
    return response()->json(['message' => 'Client supprimé avec succès']);
}



}



