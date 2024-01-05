<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Filiere;

class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filieres = Filiere::all();
        return view('filieres.index', compact('filieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filieres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Création d'une nouvelle filière
        Filiere::create([
            'nom' => $request->input('nom'),
        ]);

        // Redirection avec un message flash
        return redirect()->route('filieres.index')->with('success', 'Nouvelle filière créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filiere = Filiere::findOrFail($id);
        return view('filieres.show', compact('filiere'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filiere = Filiere::findOrFail($id);
        return view('filieres.edit', compact('filiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        // Mise à jour de la filière
        $filiere = Filiere::findOrFail($id);
        $filiere->nom = $request->input('nom');
        $filiere->save();

        // Redirection avec un message flash
        return redirect()->route('filieres.index')->with('success', 'Filière mise à jour avec succès');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Suppression de la filière
        $filiere = Filiere::findOrFail($id);
        $filiere->delete();

        // Redirection avec un message flash
        return redirect()->route('filieres.index')->with('success', 'Filière supprimée avec succès');
    
    }
}
