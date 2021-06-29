<?php

function addCommentaire($commentaire,$idArticle){
    $bdd = dbAccess();
    
    $report = 0;
    $dateCommentaire = date('Y-m-d H:i:s');
    if(isset($_SESSION["user"]) && $_SESSION["connecté"] == true){
        $pseudo = $_SESSION["user"]["login"]; 
        $auteurId = $_SESSION["user"]["id"] ;
    }else{
        $pseudo = "Anonyme";
        $auteurId = 0;
    }

    $requete = $bdd->prepare("INSERT INTO commentaires(articleId,auteurId,pseudo,dateCommentaire,contenu,reported) VALUES(?,?,?,?,?,?)");
    $requete->execute(array($idArticle,$auteurId,$pseudo,$dateCommentaire,$commentaire,$report));
    $requete->closeCursor();
}

function getAvatar($idAuteur){
    if($idAuteur != 0){
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT avatar FROM users WHERE userID = $idAuteur") or die(print_r($requete->errorInfo(), TRUE));
        $img = $requete->fetch();  
        $avatar = $img["avatar"];
        $requete->closeCursor();
    }else {
        // Si l'auteur est anonyme 
        $avatar = "../../src/img/site/defaut_avatar.png";
    }

    return $avatar;
}

function getCommentaire($idArticle){
    $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM commentaires WHERE articleId = $idArticle ORDER BY dateCommentaire DESC") or die(print_r($requete->errorInfo(), TRUE));

        $listCommentaire = [];
        // Je distribue mes données dans une variable tableau
        while($données = $requete->fetch()){
            $avatar = getAvatar($données["auteurId"]);
            $contenu = $données["contenu"];
            $auteur = $données["pseudo"];
            $date = $données["dateCommentaire"];
            $commentaireId = $données["commentaireId"];

            $listCommentaire[] = [
                "avatar" => $avatar,
                "pseudo" => $auteur,
                "contenu" => $contenu,
                "dateCommentaire" => $date,
                "commentaireId" => $commentaireId
            ];
        }
        $requete->closeCursor();

        // J'envoie les données dans mon appli
        return $listCommentaire;
}

function sendReport($idCommentaire){
    $bdd = dbAccess();
    $requete = $bdd->prepare("UPDATE commentaires
                            SET reported = 1 
                            WHERE commentaireId = ? ");
    $requete->execute(array($idCommentaire)) or die(print_r($requete->errorInfo(), TRUE));
    $requete->closeCursor();
}

function getReport(){
    $bdd = dbAccess();
    $requete = $bdd->query("SELECT * FROM commentaires WHERE reported = 1 ORDER BY dateCommentaire DESC") or die(print_r($requete->errorInfo(), TRUE));

    $listCommentaire = [];
    // Je distribue mes données dans une variable tableau
    while($données = $requete->fetch()){
        $avatar = getAvatar($données["auteurId"]);
        $contenu = $données["contenu"];
        $auteur = $données["pseudo"];
        $date = $données["dateCommentaire"];
        $commentaireId = $données["commentaireId"];
        $listCommentaire[] = [
            "avatar" => $avatar,
            "pseudo" => $auteur,
            "contenu" => $contenu,
            "dateCommentaire" => $date,
            "commentaireId" => $commentaireId
        ];
    }
    $requete->closeCursor();

        // J'envoie les données dans mon appli
        return $listCommentaire;
}

function deleteCommentaire($commentaireId){
    $bdd = dbAccess();
    $requete = $bdd->prepare("DELETE FROM commentaires WHERE commentaireId = ?");
    $requete->execute(array($commentaireId))or die(print_r($requete->errorInfo(), TRUE));
    $requete->closeCursor();
}

function validateCommentaire($commentaireId){
    $bdd = dbAccess();
    $requete = $bdd->prepare("UPDATE commentaires
                            SET reported = 0 
                            WHERE commentaireId = ? ");
    $requete->execute(array($commentaireId)) or die(print_r($requete->errorInfo(), TRUE));
    $requete->closeCursor();
}

function getMyCommentaire($userId){
    $bdd = dbAccess();
    $requete = $bdd->prepare("SELECT contenu,dateCommentaire FROM commentaires
                                WHERE auteurId = ?");
    $requete->execute(array($userId)) or die(print_r($requete->errorInfo(), TRUE));
    while($données = $requete->fetch()){
        $listCommentaire[] = $données;
    }

    return $listCommentaire;
}

?>


