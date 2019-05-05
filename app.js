var nom = document.querySelector("#verifNom");
var prenom = document.querySelector("#verifPrenom");
var mail = document.querySelector("#verifEmail");
var telephone = document.querySelector("#verifTel");
var sujet = document.querySelector("#verifSujet");
var texte = document.querySelector("#verifTexte");
const bouton = document.querySelector("#contact-submit");


bouton.addEventListener("click", function (e) {
    // console.log(prenom);

    if (prenom.value != "" && prenom.value.length > 3 && prenom.value.length <= 25) {
        // console.log('oui1');
        if (nom.value != ""  && nom.value.length > 3 && nom.value.length <= 25) {
            
            if (mail.value != "" && !mail.validity.typeMismatch) {
                
                if (telephone.value != "" && telephone.value.length >= 10 && telephone.value.lenght <=13){
                    
                         if (sujet.value != "" && sujet.value.length > 3 && sujet.value.length <= 25) {
                            
                            if (texte.value != "" && texte.value.length > 3 && texte.value.length <= 2500) {
                          
                            return true;
                        }
                    }
                }
            }
        }
    }else{
    alert("Veuillez remplir correctement tous les champs");
    e.preventDefault();
    
    return false;
   }
});