$(document).ready(function(){ //Source: http://www.rbastien.com/blog/2015/02/afficher-password-formulaire/
 
    $('.show-password').click(function() {
        if($(this).prev('input').prop('type') == 'password') {

            //Si c'est un input type password
            $(this).prev('input').prop('type','text');
            $(this).text('cacher');
        } else {
            //Sinon
            $(this).prev('input').prop('type','password');
            $(this).text('afficher');
        }
    });
    const sortButton = document.getElementById('sortAlphabetical');

    console.log(sortButton);

    sortButton.addEventListener('click', function (e) {
        header("location:")
    });
    /*let back = document.getElementById('back');
    back.addEventListener('click', function () {
        history.back();
    });*/
});

