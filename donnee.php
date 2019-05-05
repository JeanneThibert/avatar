<?php

// RECUPERER LES DONNEE D UN FORMULAIRE ET LES AFFICHERS 
$nom = $_POST['nom']; 
$prenom = $_POST['prenom'];
$sexe = $_POST['sexe'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$sujet= $_POST['sujet'];
$message = $_POST['message'];

// REGEX
$regNom = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-]+$/";
$regPrenom = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-]+$/";
$regEmail = "/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
$regTelephone = "/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/";
$regSujet = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-]+$/";
$regMessage = "/^[a-zA-ZÀÁÂÃÄÅàáâãäåÒÓÔÕÖòóôõöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-]+$/";


// LES DONNEES 
// echo ( "Votre nom : <b>".$nom."</br><br>\n");
// echo ( "Votre prenom: <b>".$prenom."</br><br>\n");
// echo ( "Votre sexe : <b>".$sexe."</br><br>\n");
// echo ("Votre email :<b>" .$email. "</br><br>\n");
// echo ("Votre email :<b>" .$telephone. "</br><br>\n");
// echo ("Votre email :<b>" .$reservation. "</br><br>\n");
// echo ( "Votre sujet : <b>".$sujet."</br><br>\n");
// echo ( "Votre texte : <b>".$message."</br><br>\n");

// ENVOI EMAIL
$passage_ligne = "\n";
$mail = 'jeanne.t@codeur.online'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}

$from = "test.form@gmail.com";

$to = "jeanne.t@codeur.online";


$subject = "Les données du formulaire de contact !";


// Déclaration du message en HTML
$message_html = "<html>
<head>
</head>
<body>
<h1>Vous avez reçu un email de ($email)</h1>
<p>Voici ses informations personnel ($prenom) ($nom) ($sexe) ($telephone) </p>
<p>Le sujet de son message ($sujet)</p>
<p> Et le corps de son message ($message)</p>
</body>
</html>";;
// Passage à la ligne

// Création de la boundary
$boundary = "-----=".md5(rand());
// Création du header de l'email
$header = "From: \"Moi-même\"<".$from.">".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header .= "Content-Type: text/html; charset=\"UTF8\"";
// Création du message
$message = $passage_ligne."--".$boundary.$passage_ligne;

$message.= $passage_ligne."--".$boundary.$passage_ligne;
// Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========

// Envoi de l'email
mail($to,$subject,$message_html, $header);






// VERIFIEZ LES DONNES DU FORMULAIRE COTE SERVEUR 
$checkNom = preg_match($regNom,$nom);
$checkPrenom = preg_match($regPrenom,$prenom);
$checkEmail= preg_match($regEmail,$email);
$checkTelephone= preg_match($regTelephone,$telephone);
$checkSujet = preg_match($regSujet,$sujet);
$checkMessage = preg_match($regMessage, $message);

// echo ($checkNom);
// echo($checkEmail);
// echo($checkPrenom);

if($checkNom != "" && $checkPrenom != "" && $checkEmail != "" && $checkTelephone != ""  && $checkSujet != "" && $checkMessage != ""){
    return true ;
    echo '<script>alert("Votre message a bien été envoyé");</script>';
}else{
    return false ;
    echo '<script>alert("Veuillez remplir correctement tout les champs  ");</script>';
    

};
?>