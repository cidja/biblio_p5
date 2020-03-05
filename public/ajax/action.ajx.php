<?php


include(dirname(__FILE__)."/../../controller/frontend.php");

if  (empty($_POST['action'])){
    die;
}
else{
    switch($_POST['action']){
        case "signalComment":
            $id = htmlspecialchars($_POST["id"]);
            $novel_id = htmlspecialchars($_POST["novel_id"]);
            $signalComment = ToolsFrontend::signalComment($id, $novel_id,false); 
            echo $signalComment;
            die;
        break;
        case "toto":

        break;
    }
}
