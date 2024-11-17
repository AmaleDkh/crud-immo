<div class="container h-100 mt-5">
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Ajouter une annonce</h3>
      <form action="{{ route('annonces.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="ref_annonce">Référence</label>
          <input type="text" class="form-control" id="ref_annonce" name="ref_annonce" required>
        </div>
        <div class="form-group">
          <label for="prix_annonce">Prix</label>
          <input type="number" class="form-control" id="prix_annonce" name="prix_annonce" required>
        </div>
        <div class="form-group">
          <label for="surface_habitable">Surface habitable</label>
          <input type="text" class="form-control" id="surface_habitable" name="surface_habitable" required>
        </div>
        <div class="form-group">
          <label for="nombre_de_piece">Nombre de pièces</label>
          <input type="text" class="form-control" id="nombre_de_piece" name="nombre_de_piece" required>
        </div>
        <div class="form-group">
          <label for="agent_immobilier_prenom">Prénom</label>
          <input type="text" class="form-control" id="agent_immobilier_prenom" name="agent_immobilier_prenom" required>
        </div>
        <div class="form-group">
          <label for="agent_immobilier_nom">Nom</label>
          <input type="text" class="form-control" id="agent_immobilier_nom" name="agent_immobilier_nom" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Créer une annonce</button>
      </form>
    </div>
  </div>
</div>