<?php
    // Récupérer les articles à la une
    function getArticleOnTop(){
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT a.articleId, a.titre, a.imgUrl, a.content, a.date, c.nomCategorie, gc.genre, u.nom, u.prenom
                                    FROM articles a
                                    INNER JOIN categorie c ON c.categorieId = a.categorieId
                                    INNER JOIN gamecategory gc ON gc.gameCategoryId = a.gameCategorieId
                                    INNER JOIN users u ON u.userId = a.auteurId
                                    INNER JOIN jeux j ON j.gameId = a.gameId
                                    INNER JOIN hardware h ON h.hardId = a.hardId
                                    INNER JOIN stars s ON s.articleId = a.articleId
                                    WHERE s.articleId = a.articleId
                                    ORDER BY starId DESC LIMIT 3");
        while($données = $requete->fetch()){
            $listOnTop[] = $données;
        }

        return $listOnTop;
    }

    function getLastsArticles(){
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT titre,imgUrl,articleId FROM articles ORDER BY date DESC LIMIT 12 ");
        while($données = $requete->fetch()){
            $listLastsArticles[] = $données;
        }

        return $listLastsArticles;
    }

    function getLastsNews(){
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT titre,imgUrl,articleId,content FROM articles WHERE categorieId = 1 ORDER BY date DESC LIMIT 12 ");
        while($données = $requete->fetch()){
            $listLastsNews[] = $données;
        }

        return $listLastsNews;
    }
?>