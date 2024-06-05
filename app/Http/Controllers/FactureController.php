<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use PDF;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    //
    public function index()
    {
        $factures = Facture::all();
        return view('Admin.index', compact('factures'));
    }

    public function create()
    {
        return view('factures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reparation_id' => 'required|exists:reparations,id',
            'date' => 'nullable|date',
            'total_amount' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
        ]);

        Facture::create($request->all());

        return redirect()->route('factures.index')
            ->with('success', 'Facture créée avec succès.');
    }

    public function show(Facture $facture)
    {
        return view('factures.show', compact('facture'));
    }

    public function edit(Facture $facture)
    {
        return view('factures.edit', compact('facture'));
    }

    public function update(Request $request, Facture $facture)
    {
        $request->validate([
            'reparation_id' => 'required|exists:reparations,id',
            'date' => 'nullable|date',
            'total_amount' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
        ]);

        $facture->update($request->all());

        return redirect()->route('factures.index')
            ->with('success', 'Facture mise à jour avec succès.');
    }

    public function destroy(Facture $facture)
    {
        $facture->delete();

        return redirect()->route('factures.index')
            ->with('success', 'Facture supprimée avec succès.');
    }

    public function downloadPDF(Facture $facture)
    {
        $pdf = PDF::loadView('pdf.pdf', compact('facture'));
        return $pdf->download('facture_'.$facture->id.'.pdf');
    }
}
