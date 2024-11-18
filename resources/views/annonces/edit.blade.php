<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifier une annonce</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<div class="container mx-auto h-screen flex justify-center items-center mt-8">
  <div class="w-full max-w-lg p-6 bg-white shadow-lg rounded-lg">
    <h3 class="text-[#064650] text-2xl font-semibold mb-6">Modifier l'annonce</h3>
    <form action="{{ route('annonces.update', $annonce->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="ref_annonce" class="block text-gray-700 font-medium mb-2">Référence</label>
        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" id="ref_annonce" name="ref_annonce" value="{{ $annonce->ref_annonce }}" required>
      </div>

      <div class="mb-4">
        <label for="prix_annonce" class="block text-gray-700 font-medium mb-2">Prix</label>
        <input type="number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" id="prix_annonce" name="prix_annonce" value="{{ $annonce->prix_annonce }}" required>
      </div>

      <div class="mb-4">
        <label for="surface_habitable" class="block text-gray-700 font-medium mb-2">Surface habitable</label>
        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" id="surface_habitable" name="surface_habitable" value="{{ $annonce->surface_habitable }}" required>
      </div>

      <div class="mb-4">
        <label for="nombre_de_piece" class="block text-gray-700 font-medium mb-2">Nombre de pièces</label>
        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" id="nombre_de_piece" name="nombre_de_piece" value="{{ $annonce->nombre_de_piece }}" required>
      </div>

      <div class="mb-4">
        <label for="agent_immobilier_prenom" class="block text-gray-700 font-medium mb-2">Prénom</label>
        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" id="agent_immobilier_prenom" name="agent_immobilier_prenom" value="{{ $annonce->agentImmobilier->prenom }}" required>
      </div>

      <div class="mb-6">
        <label for="agent_immobilier_nom" class="block text-gray-700 font-medium mb-2">Nom</label>
        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500" id="agent_immobilier_nom" name="agent_immobilier_nom" value="{{ $annonce->agentImmobilier->nom }}" required>
      </div>
      
      <button type="submit" class="w-full py-3 bg-[#87D300] text-white font-semibold rounded-md hover:bg-[#7CB700] focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition">Modifier l'annonce</button>
    </form>
  </div>
</div>