let test = document.getElementById('next');

$(document).ready(function(){
test.addEventListener('click', function (e) {
    console.log("yes");
    $.get(
        "index.php",
        "action=oneNovel&id=" + 1,
        callBackFunction,
        "text"
        );
    function callBackFunction(result){
    $("#result").html(result);
    }

    });
});
