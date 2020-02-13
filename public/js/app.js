let httpRequest = new XMLHttpRequest();

let submit = document.getElementById('submitForm'); //on vise l'élément submit 
let form = document.querySelector('#form'); // on vise l'élément #form
let result = document.getElementById('result');

form.addEventListener("submit", function(e){
    e.preventDefault();
    httpRequest.onreadystatechange = function (){
        if(httpRequest.readyState === 4){
            result.innerHTML="";
            if(httpRequest.status == 200){
              result.innerHTML = httpRequest.responseText;  
            }
        }
    }
    httpRequest.open("POST", "http://127.0.0.1/p5/index.php?action=home", true);
    let data = new FormData(form);
    httpRequest.send(data);
})

