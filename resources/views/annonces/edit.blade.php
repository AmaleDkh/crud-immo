<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Modifier l'annonce</h3>
      <form action="{{ route('annonces.update', $annonce->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="ref_annonce">Référence</label>
          <input type="text" class="form-control" id="ref_annonce" name="ref_annonce"  value="{{ $annonce->ref_annonce }}" required>
        </div>
        <div class="form-group">
          <label for="prix_annonce">Prix</label>
          <input type="number" class="form-control" id="prix_annonce" name="prix_annonce"  value="{{ $annonce->prix_annonce }}" required>
        </div>
        <div class="form-group">
          <label for="surface_habitable">Surface habitable</label>
          <input type="text" class="form-control" id="surface_habitable" name="surface_habitable"  value="{{ $annonce->surface_habitable }}" required>
        </div>
        <div class="form-group">
          <label for="nombre_de_piece">Nombre de pièces</label>
          <input type="text" class="form-control" id="nombre_de_piece" name="nombre_de_piece"  value="{{ $annonce->nombre_de_piece }}" required>
        </div>
        <div class="form-group">
          <label for="nombre_de_piece">Nombre de pièces</label>
          <input type="text" class="form-control" id="nombre_de_piece" name="nombre_de_piece" value="{{ $annonce->nombre_de_piece }}" required>
        </div>
        <div class="form-group">
          <label for="agent_immobilier_prenom">Prénom</label>
          <input type="text" class="form-control" id="agent_immobilier_prenom" name="agent_immobilier_prenom" value="{{ $annonce->agentImmobilier->prenom }}"  required>
        </div>
        <div class="form-group">
          <label for="agent_immobilier_nom">Nom</label>
          <input type="text" class="form-control" id="agent_immobilier_nom" name="agent_immobilier_nom" value="{{ $annonce->agentImmobilier->nom }}" required>
        </div>
        <button type="submit" class="btn mt-3 btn-primary">Modifier l'annonce</button>
      </form>
    </div>
  </div>
</div>