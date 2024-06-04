<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    //

    public function index()
    {
        $pieces = Piece::Paginate(8);
        return view('Admin.ListePiece', compact('pieces'));
    }

    public function create()
    {
        return view('Admin.EditP');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'reference' => 'required',
            'fournisseur' => 'required',
            'prix' => 'required|numeric',
            'quantite' => 'required|numeric',
            'seuil' => 'required|numeric',
        ]);

        Piece::create($validatedData);

        return redirect()->route('pieces.index')->with('success', 'Pièce ajoutée avec succès.');
    }

    public function edit(Piece $piece)
    {
        return view('Admin.EditP', compact('piece'));
    }

    public function update(Request $request, Piece $piece)
    {
        $validatedData = $request->validate([
            'nom' => 'required',
            'reference' => 'required',
            'fournisseur' => 'required',
            'prix' => 'required|numeric',
            'quantite' => 'required|numeric',
            'seuil' => 'required|numeric',
        ]);

        $piece->update($validatedData);

        return redirect()->route('listepiece')->with('success', 'Pièce mise à jour avec succès.');
    }

    public function destroy(Piece $piece)
    {
        $piece->delete();

        return redirect()->route('listepiece')->with('success', 'Pièce supprimée avec succès.');
    }

}
