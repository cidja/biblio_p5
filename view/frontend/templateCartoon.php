<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title;?></title>
    <link rel="icon" href="public/img/favicon.ico" >
    <link rel="stylesheet" type="text/css" href="public/css/style.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="public/js/jquery-minified.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bad7172f0a.js" crossorigin="anonymous"></script> <!--cdn fontawesome source: https://fontawesome.com/kits/bad7172f0a/settings !-->
    
</head>
<body>

    <nav class="menuCartoon navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php?action=home">
        <i class="fas fa-book-reader"></i>
        <span>Biblio BD</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav text-uppercase">
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
                    <a class="nav-link" href="index.php?action=allCartoons">Toutes les BD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=statisticsCartoon">Statistiques</a>
                </li>
                <?php
                if(isset($_SESSION["member"]) && $_SESSION["member"] == "admin"){ 
                    ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=addCartoons">Ajout</a>
                </li>
                <?php };
               if(isset($_SESSION["member"]) && $_SESSION["member"] == "admin"){ //to see administration menu
                    ?>
                    <li class="navbar-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Administration
                        </a><div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?action=backend"><button class="btn btn-info">Moderation</button></a>
                        <a class="dropdown-item" href="index.php?action=formNewPassword"><button class="btn btn-info">Modifier mot de passe</button></a>
                    </div>
                </li>
                <?php
                };
                if(isset($_SESSION["member"])){
                    ?>
                    <li class="nav-item">
                    <a class="nav-link" href="index.php?action=formNewPassword"><button class="btn btn-info">Modifier mot de passe</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=sessionStop"><button class="btn btn-warning">Déconnexion</button></a>
                    </li>
                <?php
                 };
                 if(!isset($_SESSION["member"])){ //for visit mode
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=connexionview"><button class="btn btn-warning">Connexion</button></a>
                    </li>   
                <?php 
                };
                if(isset($_SESSION["member"]) && $_SESSION["member"] == "admin"){ //admin mode
                    ?>
                    <li>
                        <div class="btn btn-primary text-uppercase mt-2">Mode administrateur</div>
                    </li>
                    
                    <?php };
                if(!isset($_SESSION["member"])){ //message for visit mode
                    ?>
                    <li>
                        <div class="btn btn-primary text-uppercase mt-2">mode visiteur aucune modification possible</div>
                    </li>
                <?php };
                if(isset($_SESSION["member"]) && $_SESSION["member"] !== "admin"){ //message for member mode
                    ?>
                    <li>
                        <div class="btn btn-primary mt-2">mode membre</div>
                    </li>
                    <?php
                };?>
            </ul>
            
        </div>
    </nav>
    <div class="containerContentCartoon +">
    <?= $content ?> <!--will contain what you want to put in the direction of listPostView.php !-->
    </div>
    

</body>
</html>