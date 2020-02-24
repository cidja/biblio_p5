<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bangers|Marck+Script&display=swap" rel="stylesheet"> <!--google font !-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bad7172f0a.js" crossorigin="anonymous"></script> <!--cdn fontawesome source: https://fontawesome.com/kits/bad7172f0a/settings !-->
</head>
<body>
    <div class=" text-center text-uppercase">
        <h1 class="titleConnexion">Il était une fois...</h1>
        <h2 class="titleConnexion">l'application de gestion de bibliothèque</h2>
    </div>
    <div class="container">
        <button class="btn btn-info"><a class="connexionViewLink bodyLink" href="index.php?action=formAccessAdmin">Connexion administrateur</a></button>
    </div>
        <button class="btn btn-danger"><a class="connexionViewLink bodyLink" href="index.php?action=formAccessUser">Connexion membre</a></button>
    
    <div class="">
        <button class="btn btn-warning" id="inscriptionButton"><a class="connexionViewLink bodyLink" href="index.php?action=inscription">Inscription</a></button>
    </div>
    <div class="">
        <button class="btn btn-success" id="visitButton" ><a class="connexionViewLink bodyLink" href="index.php?action=home">Visiteur</a></button>
    </div>
    </div>
    </section>
    
</body>
</html>