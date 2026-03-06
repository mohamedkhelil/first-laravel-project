<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <style>
        body{
            font-family: Arial;
            max-width: 800px;
            margin: 50px auto;
        }

        h1{
            color:#FF2D20;
        }
    </style>
</head>
<body>

<h1>Bienvenue sur mon site Laravel</h1>

<p>Ceci est ma première vue Blade !</p>

<p>Date actuelle : {{ date('d/m/Y') }}</p>

</body>
</html>
