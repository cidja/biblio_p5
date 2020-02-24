//In progress

     //source: https://openclassrooms.com/forum/sujet/verifier-si-deux-champs-sont-identiques-15225
        let pwd1 = $('#pwd1');
        let pwd2 = $('#pwd2');
        let result = document.getElementById('result');
        let submitButton = document.getElementById('submitButton');
        //const field = document.getElementsByClassName('field');
        function checkPasswordValue(target){
            if(target.val("")){
                target.css(
                    "border-color", "red"
                )};
        }
        checkPasswordValue(pwd1);
        checkPasswordValue(pwd2);

        submitButton.addEventListener('click', function (e) {
            if(pwd1.val() != pwd2.val()){
                e.preventDefault();
                $(".field").css(
                    "background-color", "red"
                );
                result.innerHTML = "les mots de passe ne correspondent pas";
            }
        
    });
    
