<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\AgentImmobilier;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Annonce::with('AgentImmobilier');
        $prixOrder = 'desc';
        $surfaceOrder = 'desc';
    
        // Filter by price
        if ($request->has('prix_annonce')) {
            $prixOrder = $request->prix_annonce;
            $query->orderBy('prix_annonce', $prixOrder);
        }
    
        // Filter by surface
        if ($request->has('surface_habitable')) {
            $surfaceOrder = $request->surface_habitable;
            $query->orderBy('surface_habitable', $surfaceOrder);
        }
    
        $annonces = $query->get();
    
        return view('annonces.index', compact('annonces', 'prixOrder', 'surfaceOrder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "ref_annonce" => "required",
            "prix_annonce" => "required",
            "surface_habitable" => "required",
            "nombre_de_piece" => "required",
            "agent_immobilier_prenom" => "required",
            "agent_immobilier_nom" => "required",
        ]);

        $agent = AgentImmobilier::where('prenom', $request->agent_immobilier_prenom)
            ->where('nom', $request->agent_immobilier_nom)
            ->first();


        if (!$agent) {
            $agent = AgentImmobilier::create([
                'prenom' => $request->agent_immobilier_prenom,
                'nom' => $request->agent_immobilier_nom,
            ]);
        }

        $annonce = Annonce::create([
            "ref_annonce" => $request->ref_annonce,
            "prix_annonce" => $request->prix_annonce,
            "surface_habitable" => $request->surface_habitable,
            "nombre_de_piece" => $request->nombre_de_piece,
            "agent_immobilier_id" => $agent->id,
        ]);

        return redirect()->route("annonces.index")->with("success", "Annonce créée");
    }

    /**
     * Show the form for creating a new annonce.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonces.create');
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annonce = Annonce::find($id);
        return view('annonces.edit', compact('annonce'));
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
        $request->validate([
            "ref_annonce" => "required",
            "prix_annonce" => "required",
            "surface_habitable" => "required",
            "nombre_de_piece" => "required",
            "agent_immobilier_prenom" => "required",
            "agent_immobilier_nom" => "required",
        ]);

        $annonce = Annonce::find($id);

        $agent = $annonce->AgentImmobilier;

        if ($agent) {
            if ($agent->prenom !== $request->agent_immobilier_prenom || $agent->nom !== $request->agent_immobilier_nom) {
                $agent->update([
                    'prenom' => $request->agent_immobilier_prenom,
                    'nom' => $request->agent_immobilier_nom,
                ]);
            }
        } else {
            $agent = AgentImmobilier::create([
                'prenom' => $request->agent_immobilier_prenom,
                'nom' => $request->agent_immobilier_nom,
            ]);

            $annonce->agent_immobilier_id = $agent->id;
        }

        $annonce->update($request->except(['agent_immobilier_prenom', 'agent_immobilier_nom']));

        return redirect()->route('annonces.index')
          ->with('success', 'Annonce modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annonce = Annonce::find($id);
        $annonce->delete();
        return redirect()->route('annonces.index')
          ->with('success', 'Annonce supprimée');
    } 
}
