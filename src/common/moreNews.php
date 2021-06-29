<?php 
    

    $moreNews = getLastsNews();
?>


    

    <div  id="moreNews" class=" fo-1">
    <h2 class="mb-2 ml-9 mt-3">Plus de news...</h2>
    <?php 
        foreach($moreNews as $value){
    ?>
        <div class="moreNews-row-item ">
          
            <img src="<?= $value["imgUrl"] ?>" alt="" width= 200px>
            <h2><?= $value["titre"] ?></h2>
            <p><?= $value["content"] ?></p>
            <span><a href="../../src/common/pageArticle.php?id=<?= $value["articleId"] ?>">+PLUS</a></span>
        </div>
    <?php      
        }
    ?>

    </div> 

</section>