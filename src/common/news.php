<?php

// Appeler les fichier dont j'ai besoin
    require './src/fonctions/dbAccess.php';
    require './src/fonctions/newsDbFonctions.php';
    require './src/fonctions/articlesDbFonctions.php';
    

    $listOnTop = getArticleOnTop();

    for($i = 0; $i < 3; $i++){
        $vId[$i] =intval($listOnTop[$i]["articleId"]);
        $vTitre[$i] = $listOnTop[$i]["titre"];
        $vUrl[$i] = $listOnTop[$i]["imgUrl"];
        $vCategorieArticle[$i] = $listOnTop[$i]["nomCategorie"];
    }

    $listTop = getTop();


?>


<section id="news">

    <h2 class="mb-2 ml-9">dernières news...</h2>

    <div class="contenuNews">
        <div class="vignette v1" style="background: url(<?= $vUrl[0]?>) center center/cover">
            <a href="../../src/common/pageArticle.php?id=<?= $vId[0] ?>">
                <p class="newsCategorie ml-2"><?= $vCategorieArticle[0] ?></p>
                <h2 class="ml-2 mb-2 newsTitre"><?= $vTitre[0] ?></h2>
            </a>
        </div>
        <div class="miniVignette">
            <div class="vignette v2" style="background: url(<?= $vUrl[1]?>) center center/cover">
                <a href="../../src/common/pageArticle.php?id=<?= $vId[1] ?>">
                    <p class="newsCategorie ml-2"><?= $vCategorieArticle[1] ?></p>
                    <h2 class="ml-2 mb-2 newsTitre"><?= $vTitre[1] ?></h2>
                </a>
            </div>
            <div class="vignette v3" style="background: url(<?= $vUrl[2]?>) center center/cover">
                <a href="../../src/common/pageArticle.php?id=<?= $vId[2] ?>">
                    <p class="newsCategorie ml-2"><?= $vCategorieArticle[2] ?></p>
                    <h2 class="ml-2 mb-2 newsTitre"><?= $vTitre[2] ?></h2>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="newsAndArticle mt-2">

    <div class="listNews fo-2 mt-3">
        <h2>Nos Articles mis en avant...</h2>

        <?php 
        foreach($listTop as $value){
        ?>
            <div>
                <img src="<?= $value["imgUrl"] ?>" alt="Image de l'article">
                <h2 style="color: white"><a href="../../src/common/pageArticle.php?id=<?=$value["articleId"]?>"><?= $value["titre"] ?></a></h2>
            </div>
        <?php 
        }
        ?>

    </div>

