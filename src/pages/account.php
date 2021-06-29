<?php
    $titre = "Votre compte";
    require "../../src/common/template.php";
    $mdpNok = false;
    require "../../src/fonctions/dbAccess.php";
    require "../../src/fonctions/dbFonction.php";
    require '../../src/fonctions/mesFonctions.php';
    require '../../src/fonctions/articlesDbFonctions.php';
    require '../../src/fonctions/commentairesDbFonctions.php';
    
    // traiter le formulaire d'envoi de photo
    if(isset($_FILES["fichier"])):
        // j'appelle ma fonction envoyer image dans une variable
        $photo = sendImg($_FILES["fichier"], "avatar");
        // Je lance ma fonction pour mettre à jour la base de donnée
        updateImg($photo);
        // image envoyée et mise à jour de la bd ok, je peux effacer l'ancien avatar
        unlink($_SESSION["user"]["photo"]);
        // Je mets à jour ma variable session photo
        $_SESSION["user"]["photo"] = $photo;
        // je recharge la page
        header("location ../../src/pages/account.php?maj=true&message=Félicitation, votre avatar est mis à jour!");
        header("location ../../src/pages/account.php?maj=true&message=Félicitation, votre avatar est mis à jour!");
    endif;
    
    // On verifie que le code de validation du compte est bon
    if(isset($_POST["valid"]) && $_POST["valid"] != "" ){
        $valid = $_POST["valid"];
        
        checkValidate($valid);
        if(isset($_SESSION["msgvalid"]) && $_SESSION["msgvalid"] == true){
            
            validateUser($_SESSION["user"]["id"]);
            $_SESSION["user"]["role"] = "membre";
        }
    }

    if($_SESSION["user"]["role"] == "auteur" || $_SESSION["user"]["role"] == "admin"){
        $listeMesArticles = getMyArticle($_SESSION["user"]["id"]);
    }

    $listeMescommentaires = getMyCommentaire($_SESSION["user"]["id"]);
?>

<section id="account">
    <div class="account">

        <div class="infosMembre p-2">
            <a href="../../src/pages/account.php?edit=true"><img title="Cliquez pour changer votre avatar" src="<?= $_SESSION["user"]["photo"] ?>" alt=""></a>
            <!-- Si mon user a cliqué sur la photo, faire apparaître le formulaire d'envoi de fichier -->
            <?php 
                if(isset($_GET["edit"]) && $_GET["edit"] == true):
            ?>
            <form method="post" action="../../src/pages/account.php" enctype="multipart/form-data">
                    <input type="file" name="fichier" required>
                    <input type="submit" value="Envoyez votre photo">
            </form>
            <?php endif; 
                // Si la mise à jour s'est bien passée, afficher l'information
                if(isset($_GET["maj"]) && isset($_GET["maj"]) == true):
                    echo "<h3>" . $_GET["message"] . "</h3>";
                endif;
            ?>
            <table>
                <tr>
                    <td>pseudo:</td>
                    <td><?= $_SESSION["user"]["login"] ?></td>
                </tr>
                <tr>
                    <td>Nom:</td>
                    <td><?= $_SESSION["user"]["nom"] ?></td>
                </tr>
                <tr>
                    <td>Prenom:</td>
                    <td><?= $_SESSION["user"]["prenom"] ?></td>
                </tr>
                <tr>
                    <td>Statut:</td>
                    <td><?= $_SESSION["user"]["role"] ?></td>
                </tr>
                
                <?php
                    if($_SESSION["user"]["role"] == "Temporaire"){
                ?>
                <tr>
                        <form action="" method="post">
                        
                        <?php if(isset($_SESSION["msgvalid"]) && $_SESSION["msgvalid"] == false){echo '<p class="red">Code erroné !!!</p>';}?>
                            <p>Entrez code de validation ici:</p>
                            <input type="text" name="valid" >
                            <input type="submit" value="Validez votre compte">
                        </form>

                </tr>
                <?php
                    }
                    else{
                ?>  
                <tr>
                    <td>Compte validé !</td>
                </tr>
                <?php
                    }
                ?>  

            </table>
        </div>
        <div class="contenuMembre p-2">
            <!-- Si le role est au moins auteur -->
            <?php
                if($_SESSION["user"]["role"] == "auteur" || $_SESSION["user"]["role"] == "admin"): ?>
            <h2>Vos Articles</h2>

            <?php if(count($listeMesArticles) == 0){echo"<p>pas d'articles</p>";} ?>
            
            <!-- LISTE DES ARTICLES -->
            <?php 
            foreach($listeMesArticles as $value){
            ?>
            <p><?=$value["titre"] ?> // le: <?=$value["date"] ?> </p>
            

            <?php }endif; ?>
            <h2>Vos Commentaires</h2>
            <?php if(count($listeMescommentaires) == 0){echo"<p>pas de commentaires</p>";} ?>
            
            <!-- LISTE DES COMMENTAIRES -->
            <?php 
            foreach($listeMescommentaires as $value){
            ?>
            <p><?=$value["contenu"] ?> // le: <?=$value["dateCommentaire"] ?> </p>

            <?php 
            } 
            ?>


        </div>
    </div>
</section>
<?php
    require "../../src/common/footer.php";
?>