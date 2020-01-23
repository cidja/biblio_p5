<?php

ob_start();
$title = "Fin de la BD";
?>
<section class="container">
    <div class="col">
        <h2>Félicitations pour la lecture</h2>
        <h3>En route pour la prochaine !!!</h3>
    </div>
    <div class="col">
        <button class="btn btn-success" type="button"><a class="bodyLink" href="index.php?action=allCartoons">Acceuil</a></button>
    </div>
</section>
<?php
$content = ob_get_clean();
require("templateNovel.php");
?>