<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Annonces</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white">
    <nav class="bg-white p-4 shadow-md">
      <div class="max-w-screen-xl mx-auto flex items-center justify-between">
          <a href="{{ route('annonces.index') }}" class="text-[#064650] text-2xl font-semibold">
            ANNONCES IMMOBILIÈRES
          </a>
          <a href="{{ route('annonces.create') }}" class="bg-[#87D300] text-white px-4 py-2 rounded-md shadow hover:bg-[#7CB700]">
            Ajouter une annonce
          </a>
      </div>
    </nav>

    <div class="container mx-auto mt-8">
        <div class="flex gap-4 mb-6">
            <a href="{{ route('annonces.index', ['prix_annonce' => $prixOrder === 'asc' ? 'desc' : 'asc']) }}" class="bg-[#87D300] text-white py-2 px-4 rounded-lg hover:bg-[#7CB700]">
                Filtrer par prix ({{ $prixOrder === 'asc' ? 'décroissant' : 'croissant' }})
            </a>
            <a href="{{ route('annonces.index', ['surface_habitable' => $surfaceOrder === 'asc' ? 'desc' : 'asc']) }}" class="bg-[#87D300] text-white py-2 px-4 rounded-lg hover:bg-[#7CB700]">
                Filtrer par surface ({{ $surfaceOrder === 'asc' ? 'décroissante' : 'croissante' }})
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($annonces as $annonce)
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 cursor-pointer">
                    <div class="mb-4">
                        <h5 class="text-[#064650] font-semibold text-xl">{{ $annonce->ref_annonce }}</h5>
                    </div>
                    <div class="space-y-2">
                        <p class="text-black font-semibold">Prix : <span class="font-semibold text-black">{{ $annonce->prix_annonce }} €</span></p>
                        <p class="text-black font-semibold">Surface : <span class="font-semibold text-black">{{ $annonce->surface_habitable }} m²</span></p>
                        <p class="text-black font-semibold">Nombre de pièces : <span class="font-semibold text-black">{{ $annonce->nombre_de_piece }}</span></p>
                    </div>
                    <div class="mt-4">
                        <p class="text-black font-semibold">Agent : <span class="font-semibold text-black">{{ $annonce->agentImmobilier->prenom }} {{ $annonce->agentImmobilier->nom }}</span></p>
                    </div>
                    <div class="mt-6 flex justify-between">
                        <a href="{{ route('annonces.edit', $annonce->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Modifier</a>
                        <form action="{{ route('annonces.destroy', $annonce->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
