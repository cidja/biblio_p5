<?php

ob_start();
?>
<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">
    <i class="fas fa-chevron-circle-left fa-3x"></i>
</a> <!--back to previous page source: http://memo-web.fr/categorie-html-34.php!-->
<?php
$backLink = ob_get_clean();
