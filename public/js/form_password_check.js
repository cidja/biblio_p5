//In progress

$(document).ready(function(){
    let $newMdp         = $("#newMdp"),
        $newMdpRepeat   = $("#newMdpRepat"),
        $field          = $(".field");
        $error          = $("#error");

    $newMdpRepeat.keyup(function(){
        if($(this).val() != $newMdp.val()){
            $(this).css({
                borderColor: "red",
                color: "red"
            });
            $error.css("display", "block");
            $error.innerHtml("les mots de passe ne correspondent pas");
        }
    })
    
});