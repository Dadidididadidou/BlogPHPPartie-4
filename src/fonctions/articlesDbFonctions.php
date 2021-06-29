<?php
    //Fonction pour créer un nouvel article
    function envoyerArticle($titre, $imgUrl, $content, $date, $categorieId, $gameCategoryId, $auteurId, $gameId, $hardId, $star){
        //Traitement de l'image envoyée
        $traiterImage = sendImg($imgUrl, "article");

        //Récuperer l'id de la catégorie d'article qui correspond à la selection de l'auteur
        $arrayCategorieId = getTypeArticleByName($categorieId);
        //J'envoie l'index récupéré dans une nouvelle variable
        $categorieId = $arrayCategorieId[0][0];

        // Récuperer id catégorie
        $arrayGameCategoryId = getGameCategoryByName($gameCategoryId);
        $gameCategorieId = $arrayGameCategoryId[0][0];
        
        //Récuperer l'id du jeu
        $arrayGameName = getGameByName($gameId);
        $gameId = $arrayGameName[0][0];

        // Récupérer l'id HArdware
        $arrayHardware = getHardByNAme($hardId);
        $hardId = intval($arrayHardware[0][0]);
        //Envoyer article dans DB
        $bdd = dbAccess();
        $requete = $bdd->prepare("INSERT INTO articles(titre, imgUrl, content, date, categorieId, gameCategorieId, auteurId, gameId, hardId, star)
        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $requete->execute(array($titre, $traiterImage, $content, $date, $categorieId, $gameCategorieId, $auteurId, $gameId, $hardId, $star)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
        
        //Vérifier si star est actif ou pas
        if($star == true){
            //Envoyer l'article a la une dans la table star
            aLaUne($titre);
        }
    }

    function aLaUne($valeur){
        $bdd = dbAccess();
        $requete = $bdd->prepare("SELECT articleId FROM articles
                                    WHERE titre = ?");
        $requete->execute(array($valeur)) or die(print_r($requete->errorInfo(), TRUE));
        while($donnees = $requete->fetch()){
            $articleId = $donnees[0];
        }
        $requete = $bdd->prepare("INSERT INTO stars(articleId) VALUES(?)");
        $requete->execute(array($articleId)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }

    function getTop(){
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT titre,imgUrl,articleId FROM articles WHERE star = 1 ORDER BY date DESC LIMIT 12 ");
        while($données = $requete->fetch()){
            $listTop[] = $données;
        }

        return $listTop;
    }

    function getMyArticle($userId){
        $bdd = dbAccess();
        $requete = $bdd->prepare("SELECT articleId,titre,date FROM articles
                                    WHERE auteurId = ?");
        $requete->execute(array($userId)) or die(print_r($requete->errorInfo(), TRUE));
        while($données = $requete->fetch()){
            $listArticle[] = $données;
        }

        return $listArticle;
    }
?>