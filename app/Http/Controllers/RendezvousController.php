<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Mecanique;
use App\Models\rendezvous;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{
    //
    public function index()
    {
        $rendezvouses = Rendezvous::with(['client.user', 'mecanique.user'])->get();

        return view('Admin.RDV', compact('rendezvouses'));
    }

    public function create()
    {
        $rendezvouses = Rendezvous::with(['client.user', 'mecanique.user'])->get();
        $clients = User::where('role', 'client')->get();
        $mecaniciens=User::where('role', 'mecanicien')->get();
        return view('Admin.rdvcreate',compact('rendezvouses','clients','mecaniciens'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'mec_id' => 'required|exists:mecaniques,id',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|in:en_attente,confirmé,annulé',
        ]);

        rendezvous::create($validatedData);

        return redirect()->route('RDVindex')->with('success', 'Rendez-vous créé avec succès.');
    }

    public function show($id)
    {
        $appointment = rendezvous::findOrFail($id);
        return view('Admin.rdvshow', compact('appointment'));
    }

    public function edit($id)
    {
        $appointment = rendezvous::findOrFail($id);
        return view('Admin.RDVedit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'mec_id' => 'required|exists:mecaniciens,id',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|in:en_attente,confirmé,annulé',
        ]);

        $appointment = rendezvous::findOrFail($id);
        $appointment->update($validatedData);

        return redirect()->route('RDVindex')->with('success', 'Rendez-vous mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $appointment = rendezvous::findOrFail($id);
        $appointment->delete();

        return redirect()->route('RDVindex')->with('success', 'Rendez-vous supprimé avec succès.');
    }
}
