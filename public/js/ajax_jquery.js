//script put in oneNovelView.php
$(document).ready(function(){
    const alreadySignal = $('#alreadySignal');
    console.log(alreadySignal);
        let signalLink = document.getElementsByClassName('signalLink');
        

     signalLink.addEventListener('click', function (e) {
        console.log("yes");
        $.get(
            "index.php",
            "action=signalComment&id=20&novel_id=34",
            callBackFunction,
            "text"
            );
        function callBackFunction(result){
            console.log(result);
        $("#alreadySignal").html("en attente de modération");
        }
     }); 
    });
     