//In progress

     //source: https://openclassrooms.com/forum/sujet/verifier-si-deux-champs-sont-identiques-15225
        const user = $('#user');
        const pwd1 = $('#pwd1');
        const pwd2 = $('#pwd2');
        
        const result = document.getElementById('result');
        const submitButton = document.getElementById('submitButton');
        

        

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
    
