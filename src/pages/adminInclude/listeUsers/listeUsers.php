<h2>Liste des jeux</h2>

<div>

    <?php 
            // Je conditionne l'accès à ces requête uniquement si l'utilsateur est admin
        if(isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] == "admin"){

            // EFFACER UN JEU
            if(isset($_GET["choix"]) && (isset($_GET["delete"]) && ($_GET["delete"] == true)) && isset($_GET["value"])){
                // Je converti mon get Value en entier
                $userId = intval($_GET["value"]);
                banUser($_GET["value"]);
            }

    }
            // Je lance ma fonction pour récupèrer les catégories existantes
            $listeUser = getUsers();
            
    ?> 
    
    <!-- Constuire mon tableau liste des jeux -->
    <table class="mlr-a mt-3 p-1">
        <thead>
            <tr>
                <th  class="p-1" colspan="8" style="text-align: center">Liste des Jeux</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Avatar</td>
                <td>Pseudo</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Mail</td>
                <td>Ban</td>
                
            </tr>
        <!-- Générer dynamiquement les lignes après requete pour récupérer les users de ma db -->
        <?php
            for($i =0; $i < count($listeUser); $i++){
        ?>
            <tr>
                <td><img src="<?=$listeUser[$i]["avatar"]?>" alt="image de profil" class="profilImgCommentaire"></td>
                <td><?=$listeUser[$i]["login"]?></td>
                <td><?=$listeUser[$i]["nom"]?></td>
                <td><?=$listeUser[$i]["prenom"]?></td>
                <td><?=$listeUser[$i]["email"]?></td>
                

                
                <?php 
                    if($listeUser[$i]["ban"] != ""){
                ?>
                <td class="ta-c tc-r"><a href="../../src/pages/admin.php?choix=listeUser&delete=true&value=<?=$listeUser[$i]["userId"]?>"><i class="far fa-trash-alt"></i></a></td>
                
                <?php
                } else {
                ?>
                <td>BANNI</td>
                <?php
                }
                ?>
                


                
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>