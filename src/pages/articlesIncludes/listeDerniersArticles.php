<?php 

$listLastsArticles = getLastsArticles();

?>

<section>

<div class="listArticle">
    <h2>Nos Derniers Articles...</h2>

    <?php 
    foreach($listLastsArticles as $value){
    ?>
        <div>
            <img src="<?= $value["imgUrl"] ?>" alt="Image de l'article" >
            <h2 style="color: white"><a href="../../src/common/pageArticle.php?id=<?=$value["articleId"]?>"><?= $value["titre"] ?></a></h2>

        </div>
    <?php 
    }
    ?>

</div>


</section>