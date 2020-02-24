<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création nouvel utilisateur</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bangers|Marck+Script&display=swap" rel="stylesheet"> <!--google font !-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bad7172f0a.js" crossorigin="anonymous"></script> <!--cdn fontawesome source: https://fontawesome.com/kits/bad7172f0a/settings !-->
</head>
    <body>
        <div class="container text-center">
            <h2>Création d'un nouvel utilisateur :</h2>
            <div class="formUser">
                <form action="/p5/index.php?action=createUserConfirm" method="post">
                    <div class="form-group">
                        <label for="pseudo">Nom d'utilisateur : </label>
                        <input type="text" class="form-control" id="pseudo" name="pseudo">
                    </div>
                    <div class="form-group">
                        <label for="password1">Mot de passe : </label>
                        <input type="password" class="form-control field" id="pwd1" name="password1">
                    </div>
                    <div class="form-group">
                        <label for="password2">Retaper le mot de passe : </label>
                        <input type="password" class="form-control field" id="pwd2" name="password2">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-info" type="submit" value="valider" id="submitButton">
                    </div>
                </form>
                <div id="result"></div>
            </div>
        </div>
        <script src="/p5/public/js/form_password_check.js"></script>
    </body>
</html>