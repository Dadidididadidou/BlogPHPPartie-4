<?php
function getListGame(){
        $bdd=dbAccess();
        $requete = $bdd->query("SELECT * FROM jeux
                                INNER JOIN hardware ON consoleid = hardid
                                INNER JOIN gameCategory ON jeux.gameCategoryid = gameCategory.gameCategoryid") or die(print_r($requete->errorInfo(),true));

        while($donnée = $requete->fetch()){
            $listGame[] = $donnée;
        }
        $requete->closeCursor();
        
        return $listGame;
    }

    function addGame($jeux){
        $bdd=dbAccess();
        $requete = $bdd->prepare("INSERT INTO jeux(nom,consoleid,gameCategoryid,developpeur,editeur,dateDeSortie,cover) VALUES(?,?,?,?,?,?,?)");
        $requete->execute(array($jeux["nom"],$jeux["consoleid"],$jeux["gameCategoryid"],$jeux["developpeur"],$jeux["editeur"],$jeux["dateDeSortie"],$jeux["cover"])) or die(print_r($requete->errorInfo(),TRUE));
        $requete->closeCursor();
    }

    function deleteGame($gameId){
        $bdd=dbAccess();
        $requete = $bdd->prepare("DELETE FROM jeux WHERE gameid = ?");
        $requete->execute(array($gameId)) or die(print_r($requete->errorInfo(),TRUE));
        $requete->closeCursor();
    }

    function getHard(){
        $bdd=dbAccess();
        $requete = $bdd->query("SELECT * FROM hardware") or die(print_r($requete->errorInfo(),true));

        while($donnée = $requete->fetch()){
            $listHard[] = $donnée;
        }
        $requete->closeCursor();
        
        return $listHard;
    }

    function getGenre(){
        $bdd=dbAccess();
        $requete = $bdd->query("SELECT * FROM gamecategory") or die(print_r($requete->errorInfo(),true));

        while($donnée = $requete->fetch()){
            $listGenre[] = $donnée;
        }
        $requete->closeCursor();
        
        return $listGenre;
    }
?>