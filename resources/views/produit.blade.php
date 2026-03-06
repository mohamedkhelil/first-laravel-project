<!DOCTYPE html>
<html lang="fr">
<head>
 <meta charset="UTF-8">
 <title>Produits</title>
 <style>
 body {
 font-family: Arial;
 max-width: 800px;
 margin: 50px auto;
 padding: 20px;
 }
 h1 {
 color: #FF2D20;
 }
 .produit {
 background: #f9f9f9;
 padding: 15px;
 margin: 10px 0;
 border-left: 4px solid #FF2D20;
 }
 </style>
</head>
<body>
 <h1>Liste des Produits</h1>
 @if (count($produits) > 0)
 @foreach ($produits as $produit)
 <div class="produit">
 <h3>{{ $produit['nom'] }}</h3>
 <p>Prix : {{ $produit['prix'] }} €</p>
 </div>
 @endforeach
 @else
 <p>Aucun produit disponible.</p>
 @endif
</body>
</html>

