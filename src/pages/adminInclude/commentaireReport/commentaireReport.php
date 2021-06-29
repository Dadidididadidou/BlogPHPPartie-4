<h2>Liste des jeux</h2>

<div>

    <?php 
            // Je conditionne l'accès à ces requête uniquement si l'utilsateur est admin
        if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "admin"){
            

            // EFFACER UN COM
            if(isset($_GET["choix"]) && (isset($_GET["delete"]) && ($_GET["delete"] == true)) && isset($_GET["value"])){
                // Je converti mon get Value en entier
                $commentaireId = intval($_GET["value"]);
                deleteCommentaire($_GET["value"]);
            }

            if(isset($_GET["choix"]) && (isset($_GET["validate"]) && ($_GET["validate"] == true)) && isset($_GET["value"])){
                // Je converti mon get Value en entier
                $commentaireId = intval($_GET["value"]);
                validateCommentaire($_GET["value"]);
            }

    }
            // Je lance ma fonction pour récupèrer les com report existants
            $listeCommentaire = getReport();
    ?> 
    
      
        
    <!-- Constuire mon tableau liste des jeux -->
    <table class="mlr-a mt-3 p-1">
        <thead>
            <tr>
                <th  class="p-1" colspan="8" style="text-align: center">Liste des Commentaires reportés</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Utilisateur</td>
                <td>Date</td>
                <td>Contenu</td>
                
            </tr>
        <!-- Générer dynamiquement les lignes -->
        <?php
            for($i =0; $i < count($listeCommentaire); $i++){
        ?>
            <tr>
                <td><?=$listeCommentaire[$i]["pseudo"]?></td>
                <td><?=$listeCommentaire[$i]["dateCommentaire"]?></td>
                <td><?=$listeCommentaire[$i]["contenu"]?></td>
                
                <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeCommentaire&validate=true&value=<?=$listeCommentaire[$i]["commentaireId"]?>"><i class="fab fa-angellist"></i></a></td>
                <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeCommentaire&delete=true&value=<?=$listeCommentaire[$i]["commentaireId"]?>"><i class="far fa-trash-alt"></i></a></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>