<?php 


$listeCommentaire = getCommentaire($id);
//var_dump($listeCommentaire);

// si un commentaire a été reporté on le signale a la DB
if(isset($_GET["report"]) && $_GET["report"] == true && isset($_GET["reportid"])){
    $reportiId = intval($_GET["reportid"]);
    if(is_int($reportiId)){
        sendReport($reportiId);
    }

}

?>
<section class="commentaires">   
<div class="formulaire">
    
        
    <h4 class="ml-2">Commentez cet article</h4>
    <div> <img src="<?= $imgProfil ?>" alt="Image de profil" class="profilImgCommentaire ml-2"> <p class="ml-2"><?= $pseudo ?></p> </div> 
        
    <?php 
        if(isset($_SESSION["connect"]) && isset($_SESSION["user"]) &&  $_SESSION["connect"] == true && $_SESSION["user"]["role"] != "Temporaire" ){
    ?>
        <table>
        <form action="" method="post">
            <tr>
                <td class="ta-c tc-g">
                    <textarea name="commentaire" id="" cols="30" rows="10" placeholder="Entrez votre commentaire" required></textarea>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Envoyer Commentaire"></td>
            </tr>
        </form>
    </table>
    <?php 
        }
        else{
    ?>
            <p class="red">seul les utilisateurs connecté avec un compte validé peuvent écrire un commentaire</p> 
    <?php
        }
    ?>

    
    
</div>
</section>

<section class = commentaires>
    <?php
    //var_dump($listeCommentaire);
        foreach($listeCommentaire as $value){
    ?>
    <div>
        <div class="commentaireTop mt-2">
            <img src="<?= $value["avatar"] ?>" alt="image de profil" class="profilImgCommentaire ml-1 mt-1 mb-1">
            <p class="ml-1 mt-1 mb-1"><?= $value["pseudo"]?> le <?= $value["dateCommentaire"]?><br> </p>
        </div>
        <div class="commentaireBot">
            <p class="ml-1"><?= $value["contenu"]?></p><br>
            <p><a href="../../src/common/pageArticle.php?id=<?=$id?>&report=true&reportid=<?=$value["commentaireId"] ?>" class="red ml-2">Reporter ce mesage</a></p>
        </div>
    </div>
    <?php
        }
    ?>
    

</section>
