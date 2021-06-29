<?php 

$dest = "lejeunemedhy@live.be";
$sujet = "Email de test";
$corp = "ceci est est un mail test envoyer par script php";
$headers = "From: lejeunemedhy@gmail.com";

if(mail($dest,$sujet,$corp,$headers)){
    echo "mail envoyer avec succès à $dest ...";
}
else
{
    echo "echec de l'envoi de l' email à $dest ...";
}


?>