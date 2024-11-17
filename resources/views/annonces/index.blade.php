<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>annonces</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand h1" href={{ route('annonces.index') }}>ANNONCES IMMOBILIÈRES</a>
      <div class="justify-end ">
        <div class="col ">
          <a class="btn btn-sm btn-success" href={{ route('annonces.create') }}>Ajouter une annonce</a>
        </div>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
  <a href="{{ route('annonces.index', ['prix_annonce' => $prixOrder === 'asc' ? 'desc' : 'asc']) }}" class="btn btn-sm btn-warning">
    Filtrer par prix {{ $prixOrder === 'asc' ? 'decroissant' : 'croissant' }}
  </a>
  <a href="{{ route('annonces.index', ['surface_habitable' => $surfaceOrder === 'asc' ? 'desc' : 'asc']) }}" class="btn btn-sm btn-warning">
    Filtrer par surface {{ $surfaceOrder === 'asc' ? 'decroissante' : 'croissante' }}
  </a>
    <div class="row"> 
      @foreach ($annonces as $annonce)
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">{{ $annonce->ref_annonce }}</h5>
            </div>
            <div class="card-body">
              <p class="card-text">{{ $annonce->prix_annonce }}</p>
              <p class="card-text">{{ $annonce->surface_habitable }}</p>
              <p class="card-text">{{ $annonce->nombre_de_piece }}</p>
              <div>
              <p class="card-text">{{ $annonce->agentImmobilier->prenom }}</p>
              <p class="card-text">{{ $annonce->agentImmobilier->nom }}</p> 
              </div>
            </div>
            <div class="card-footer">
              <div class="row">
                <div class="col-sm">
                  <a href="{{ route('annonces.edit', $annonce->id) }}"
            class="btn btn-primary btn-sm">Modifier</a>
                </div>
                <div class="col-sm">
                    <form action="{{ route('annonces.destroy', $annonce->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</body>
</html>