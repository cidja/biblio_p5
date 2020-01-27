<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title;?></title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bad7172f0a.js" crossorigin="anonymous"></script> <!--cdn fontawesome source: https://fontawesome.com/kits/bad7172f0a/settings !-->
    
</head>
<body>
<?php if(isset($_SESSION["user"])){
    ?>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php?action=home">
        <i class="fas fa-book-reader"></i>
        <span>Biblio Livres</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" ide="navbarNav">
            <ul class="navbar-nav">
                <li class="navbar-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Accueil
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?action=allNovels">Livres</a>
                        <a class="dropdown-item" href="index.php?action=allCartoons">BD</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=novelCurrent">Livre en cours </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=novelsRead">Livres déjà lus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=allNovels">Tous les livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=statistics">Statistiques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=addNovel">Ajout</a>
                </li>
            </ul>
            <form class="form-inline" id="searchForm">
                <input class="form-control mr-sm-2" type="search" placeholder="rechercher un ouvrage" aria-label="search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
            <li class="nav-item">
                <button class="btn btn-warning"><a  href="index.php?action=sessionStop">Déconnexion</a></button>
            </li>
        </div>
    </nav>
    <div class="containerContent +">
    <?= $content ?> <!--will contain what you want to put in the direction of listPostView.php !-->
    </div>
    <?php
}
else{ // If no session is started with user and pwd we don't give access and return to the login page. 
    ?> 
    <div class="container text-center jumbotron mt-5">
        <div class="col">
            <i class="fas fa-door-closed fa-4x"></i>
        </div>
        <div class="col">
            Vous n'êtes pas connecté, un petit tour sur la page de connexion ? 
        </div>
        <div class="col">
            <button class="btn btn-warning"><a class="bodyLink" href="connexionView.php">Page de connexion</a></button>
        </div>
    </div>
    <?php
}
?>

</body>
</html>