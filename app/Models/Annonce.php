<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $fillable = [
        "ref_annonce",
        "prix_annonce",
        "surface_habitable",
        "nombre_de_piece",
        "agent_immobilier_id",
    ];

    public function agentImmobilier()
    {
        return $this->belongsTo(AgentImmobilier::class, 'agent_immobilier_id');
    }
}
