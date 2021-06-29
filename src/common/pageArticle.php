<!-- importer nouveau style pour les articles -->

<link rel="stylesheet" href="../css/article.css">
<link rel="stylesheet" 
    media="only screen and (max-width: 1266px)"
    href="../css/mobileArticle1266px.css">
    <link rel="stylesheet" 
    media="only screen and (max-width: 1100px)"
    href="../css/mobileArticle1100px.css">

<?php
    $titre="Belgium Video Gaming";
    require "../../src/common/template.php";
    require "../../src/fonctions/dbAccess.php";
    require "../../src/fonctions/afficherArticleDbFonctions.php";
    require "../../src/fonctions/commentairesDbFonctions.php";
    require "../../src/fonctions/newsDbFonctions.php";

    // Je récupère l'id qui est fourni par l'url via mon get
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        // j'envoyer l'entier de ma valeur dans une variable id
        $id = intval($_GET["id"]);
        // J'execute une requete pour récupérer mon contenu 
        $contenuArticle = getArticleContent($id);
        // var_dump($contenuArticle);
    } 

    // On attribue l'image et le pseudo de l'user pour les commentaire
    if(isset($_SESSION["user"] ) && $_SESSION["connecté"] == true){
        $imgProfil = $_SESSION["user"]["photo"];
        $pseudo = $_SESSION["user"]["login"];
    }else {
        $imgProfil = "../../src/img/site/defaut_avatar.png";
        $pseudo = "Anonyme";
    }
    // Si un commentaire a été envoyé
    if(isset($_POST["commentaire"])){
        $commentaire = $_POST["commentaire"];
        addCommentaire($commentaire,$id);
        header("location: ../../src/common/pageArticle.php?id=$id");
        exit();
    }
?>


<!-- Composer le header de notre article -->
<section class="headerArticle">

    <!-- 1ere partie avec la cover de mon jeu -->
    <?php
        if($contenuArticle[0]["cover"]){
        ?>
            <div>
                <img src="<?= $contenuArticle[0]["cover"] ?>" alt="Cover du jeu">
            </div>
        <?php
        } else {
            ?>
            <div></div>
            <?php
        }
    ?>
    <!-- Les informations du jeu cité dans l'article -->
    <div class="infoJeu">
        <h2><?= $contenuArticle[0]["nom"] ?></h2>
        <p>
            genre: <?= $contenuArticle[0]["genre"] ?> | éditeur <?= $contenuArticle[0]["editeur"] ?> 
            | développeur: <?= $contenuArticle[0]["developpeur"] ?> | disponible: <?= $contenuArticle[0]["dateDeSortie"] ?> 
            | Auteur: <?= $contenuArticle[0]["auteurNom"] ?> <?= $contenuArticle[0]["auteurPrenom"] ?>
        </p>
    </div>
</section>

<section class="monArticle">

        <!-- Intégralité de mon article sur lequel le flex principal est appliqué -->
        <div class="article">
            <!-- Section qui contient l'image et le titre -->
            <div class="background" style="background: url(<?= $contenuArticle[0]['imgUrl'] ?>) center  center/cover; min-height: 50vh">
                <div class="titreArticle">
                    <h1><?= $contenuArticle[0]["titre"] ?></h1>
                </div>
            </div>
            <!-- Le contenu de mon article -->
            <div class="contenuArticle">
                <?= $contenuArticle[0]["content"] ?>
            </div>

            <!-- J'injecterai les commentaires de mes users -->    
        </div>

        
            <?php require "../../src/pages/articlesIncludes/listeDerniersArticles.php" ?>
        
</section>

<?php
    require "../../src/pages/articlesIncludes/commentaires.php";
    require "../../src/common/footer.php";
?>