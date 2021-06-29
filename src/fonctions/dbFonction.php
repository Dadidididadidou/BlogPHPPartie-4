<?php

// Enregister un nouvel user dans ma base de donnée
    function createUser($avatar, $login, $nom, $prenom, $email, $mdp, $roleId, $ban, $valid){
    
        $bdd = dbAccess();
        $requete = $bdd->prepare("INSERT INTO users(avatar, login, nom, prenom, email, mdp, roleId, ban, valid)
                                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $requete->execute(array($avatar, $login, $nom, $prenom, $email, $mdp, $roleId, $ban, $valid)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }

// Fonction pour se connecter au site
    function login($user, $password){
        // connection à la db
        $bdd = dbAccess();
        // requete pour récupérer l'user correspondant au login entré
        $requete = $bdd->query('SELECT * 
                                FROM users u 
                                INNER JOIN role r ON r.roleId = u.roleId;') or die(print_r($requete->errorInfo(), TRUE));

        // Traitement de la requete
        while($result = $requete->fetch()){
            if($result["login"] == $user){
                // sel du mdp envoyé avec le sel contenu dans la colonne ban
                $sel = md5($password) . $result["ban"];
                
                //J'active ma session user avec les infos dont je pourrai avoir besoin
                // tant que mon utilisateur est connecté 
                if($result["mdp"] == $sel){
                    $_SESSION["connect"] = true;
                    $_SESSION["user"] = [
                        "id" => $result["userId"],
                        "nom" => $result["nom"],
                        "prenom" => $result["prenom"],
                        "photo" => $result["avatar"],
                        "login" => $result["login"],
                        "email" => $result["email"],
                        "role" => $result["nomRole"]
                    ];
                    // J'active la session connecté
                    $_SESSION["connecté"] = true;
                    // Je ferme ma connection
                    $requete->closeCursor();
                    // Je redirige vers la page account
                    header("location: ../../src/pages/account.php");
                    exit();
                }
                else if($result["ban"] == ""){
                    header("location: ../../src/pages/login.php?erreur=Vous avez été banni car vous avez été vilain ! ");
                    exit();
                }
                else{
                    header("location: ../../src/pages/login.php?erreur=Mot de passe incorrect");
                    exit();
                }
            }
        }
        // Si mon script arrive ici, il est sorti de ma boucle sans trouver de user
        header("location: ../../src/pages/login.php?erreur=Identifiant inconnu, veuillez recommencer!");
        exit();
    }

    // FONCTION POUR UPDATER UNE PHOTO
    function updateImg($files){
        $bdd = dbAccess();
        $requete = $bdd->prepare("UPDATE users
                                SET avatar = ? 
                                WHERE userId = ? ");
        $requete->execute(array($files, $_SESSION["user"]["id"])) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
}

    // function createUsertmp($avatar, $login, $nom, $prenom, $email, $mdp, $roleId, $ban, $valid){
    
    //     $bdd = dbAccess();
    //     $requete = $bdd->prepare("INSERT INTO userstmp(avatar, login, nom, prenom, email, mdp, roleId, ban, valid)
    //                             VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");

    //     $requete->execute(array($avatar, $login, $nom, $prenom, $email, $mdp, $roleId, $ban, $valid)) or die(print_r($requete->errorInfo(), TRUE));
    //     $requete->closeCursor();
    // }

    
    function checkValidate($valid){
        $bdd = dbAccess();
        $requete = $bdd->prepare("SELECT COUNT(*) AS X FROM users WHERE valid like '$valid'") or die(print_r($requete->errorInfo(), TRUE));
        $requete->execute(array($valid));    
        while($result = $requete->fetch()){
            if($result["X"] != 0){
                $_SESSION["msgvalid"] = true;
                //header("location: ../../src/pages/register.php");
                //exit();
            }
            else if($result["X"] == 0){
                $_SESSION["msgvalid"] = false;
            }
        }
    }

    function validateUser($userId){
        $bdd = dbAccess();
        $requete = $bdd->prepare("UPDATE users
                                SET roleId = 4 
                                WHERE userId = ? ");
        $requete->execute(array($userId)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
        delValid($userId);
    }

    function delValid($userId){
        $bdd = dbAccess();
        $requete = $bdd->prepare("UPDATE users
                                SET valid = '' 
                                WHERE userId = ? ");
        $requete->execute(array($userId)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();
    }

    function getUsers(){
        $bdd = dbAccess();
        $requete = $bdd->query("SELECT * FROM users") or die(print_r($requete->errorInfo(), TRUE));
    
        $listUsers = [];
        // Je distribue mes données dans une variable tableau
        while($données = $requete->fetch()){
            $avatar = $données["avatar"];
            $login = $données["login"];
            $nom = $données["nom"];
            $prenom = $données["prenom"];
            $email = $données["email"];
            $ban = $données["ban"];
            $id = $données["userId"];

            $listUsers[] = [
                "avatar" => $avatar,
                "login" => $login,
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "ban" => $ban,
                "userId" => $id
            ];
        }
        $requete->closeCursor();
    
            // J'envoie les données dans mon appli
            return $listUsers;
    }

    function banUser($userId){

        $bdd = dbAccess();
        $requete = $bdd->prepare("UPDATE users
                                SET ban = '' 
                                WHERE userId = ? ");
        $requete->execute(array($userId)) or die(print_r($requete->errorInfo(), TRUE));
        $requete->closeCursor();

    }
    
    