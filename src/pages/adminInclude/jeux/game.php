<?php	
require "../../src/fonctions/gameDbFonction.php";

if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "admin"){
    if(isset($_POST["nom"]) && !empty($_POST["nom"])){
        
        $jeux = [
            "nom" => $_POST["nom"],
            "consoleid" => $_POST["hardware"],
            "gameCategoryid" => $_POST["genre"],
            "developpeur" => $_POST["developpeur"],
            "editeur" => $_POST["editeur"],
            "dateDeSortie" => $_POST["dateDeSortie"],
            "cover" => $_POST["cover"]
        ];
        addGame($jeux);
        
    }

    if(isset($_GET["deleteGame"]) && $_GET["deleteGame"] == true ){
        $gameId = htmlspecialchars($_GET["value"]) ;
        $gameId=intval($gameId);
        deleteGame($gameId);
    }
    
}
    $listeGenre= getGenre();
    $listeHard = getHard();
    $listeJeux = getListGame();
    
?>

<a href="../../src/pages/admin.php?choix=listeJeux&createGame=true/#typeJeux">Ajouter Jeux <i class="far fa-plus-square"></i></a>

<?php 
    if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "admin"){
        if(isset($_GET["createGame"]) && $_GET["createGame"] == true){
?>
            <form action="" method="post">
                
                <table class="mlr-a mt-3 p-1" id="typeJeux">

                    <tr><td><input type="text" name="nom" placeholder="Nom du Jeux"></td></tr>
                    <tr><td><input type="text" name="developpeur" placeholder="développeur"></td></tr>
                    <tr><td><input type="text" name="editeur" placeholder="Editeur"></td></tr>
                    <tr><td><input type="date" name="dateDeSortie"></td></tr>
                    <tr><td><input type="text" name="cover" placeholder="Adresse cover"></td></tr>
                    <tr><td><select name="hardware" id="hardware">
                        <?php
                        foreach($listeHard as $value){
                        ?>
                            <option value="<?=$value["hardid"] ?>"><?=$value["console"] ?></option>
                        <?php
                        }
                        ?>
                    </select></td></tr>
                    <tr><td><select name="genre" id="genre">
                        <?php
                        foreach($listeGenre as $value){
                        ?>
                            <option value="<?=$value["gameCategoryid"] ?>"><?=$value["genre"] ?></option>
                        <?php
                        }
                        ?>
                    </select></td></tr>
                    <tr><td><input type="submit" value="Ajouter Jeux"></td></tr>
                </table>
                
                
            </form>
    <?php
        }
    }
    ?>


<table class="mlr-a mt-3 p-1">
    <thead>
        <tr>
            <th colspan=8>Liste des jeux</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>Nom du jeux</td>
            <td>Développeur</td>
            <td>Editeur</td>
            <td>Date de sortie</td>
            <td>Cover</td>
            <td>Console</td>
            <td>Genre</td>
            <td>Supprimer</td>
        </tr>
        <?php
        foreach($listeJeux as $value){
        ?>
        <tr>
                <td><?= $value["nom"]?></td>
                <td><?= $value["developpeur"]?></td>
                <td><?= $value["editeur"]?></td>
                <td><?= $value["dateDeSortie"]?></td>
                <td><?= $value["cover"]?></td>
                <td><?= $value["console"]?></td>
                <td><?= $value["genre"]?></td>
  
                <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeJeux&deleteGame=true&value=<?= $value["gameid"] ?>"><i class="far fa-plus-square"></i></a></td>
        </tr>
        <?php
            }
        ?>

        
        
    </tbody>
</table>