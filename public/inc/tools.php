<?php
function testnotUserIssetVisitTitle() {if(!isset($_SESSION)){ ?>
    <h2 class="textDemo container text-center text-uppercase">Mode visiteur aucune modification possible</h2> 
    <?php }; };

function nameInComment(){
    if(isset($_SESSION["member"])){
        echo $_SESSION["member"];
    }; 
}


    ?> 
