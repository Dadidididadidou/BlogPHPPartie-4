<?php 

function getHardCategorie(){
        $bdd=dbAccess();
        $requete = $bdd->query("SELECT * FROM hardware") or die(print_r($requete->errorInfo(),true));

        while($donnée = $requete->fetch()){
            $listHardCategorie[] = $donnée;
        }
        $requete->closeCursor();
        
        return $listHardCategorie;
    }

    function addHardCategorie($console){  
        $bdd=dbAccess();
        $requete = $bdd->prepare("INSERT INTO hardware(console) VALUES(?)");
        $requete->execute(array($console)) or die(print_r($requete->errorInfo(),TRUE));
        $requete->closeCursor();
    }

    function deleteHardCategorie($hardId){
        $bdd=dbAccess();
        $requete = $bdd->prepare("DELETE FROM hardware WHERE hardId = ?");
        $requete->execute(array($hardId)) or die(print_r($requete->errorInfo(),TRUE));
        $requete->closeCursor();
    }

    function getCategorie(){
        $bdd=dbAccess();
        $requete = $bdd->query("SELECT * FROM categorie") or die(print_r($requete->errorInfo(),true));

        while($donnée = $requete->fetch()){
            $listCategorie[] = $donnée;
        }
        $requete->closeCursor();
        
        return $listCategorie;
    }

    function getGameCategorie(){
        $bdd=dbAccess();
        $requete = $bdd->query("SELECT * FROM gamecategory") or die(print_r($requete->errorInfo(),true));

        while($donnée = $requete->fetch()){
            $listGameCat[] = $donnée;
        }
        $requete->closeCursor();
        
        return $listGameCat;
    }

    function addGameCategorie($gameCat){  
        $bdd=dbAccess();
        $requete = $bdd->prepare("INSERT INTO gamecategory(genre) VALUES(?)");
        $requete->execute(array($gameCat)) or die(print_r($requete->errorInfo(),TRUE));
        $requete->closeCursor();
    }

    function deleteGameCategorie($gameCatId){
        $bdd=dbAccess();
        $requete = $bdd->prepare("DELETE FROM gamecategory WHERE gameCategoryid = ?");
        $requete->execute(array($gameCatId)) or die(print_r($requete->errorInfo(),TRUE));
        $requete->closeCursor();
    }
?>