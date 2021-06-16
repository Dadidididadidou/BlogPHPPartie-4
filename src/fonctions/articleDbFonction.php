<?php 

function addTypeArticle($typeArticle){  
    $bdd=dbAccess();
    $requete = $bdd->prepare("INSERT INTO categorie(nomCategorie) VALUES(?)");
    $requete->execute(array($typeArticle)) or die(print_r($requete->errorInfo(),TRUE));
    $requete->closeCursor();
}

function deleteTypeArticle($deleteType){
    $bdd=dbAccess();
    $requete = $bdd->prepare("DELETE FROM categorie WHERE categorieid = ?");
    $requete->execute(array($deleteType)) or die(print_r($requete->errorInfo(),TRUE));
    $requete->closeCursor();
}

?>