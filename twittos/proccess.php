<?php
require_once 'connexion.php';
session_start();

if(isset($_POST['pseudo']) && isset($_POST['password'])) {
    $pseudo = $_POST['pseudo']; 
    $password = $_POST['password'];

    // Vérifie si l'utilisateur existe dans la base de données
    $requete = $database->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
    $requete->bindParam(':pseudo', $pseudo);
    $requete->execute();
    $user = $requete->fetch();

    if($user) {
        
        // Vérifie si le mot de passe est correct
        if(password_verify($password, $user['password'])) {

            // Si connexion réussie, enregistre l'utilisateur dans la session
            $_SESSION['user'] = array(
                'id' => $user['id'],
                'pseudo' => $user['pseudo'],
                'mail' => $user['mail'],
                'picture' => $user['picture']
            );
            
            //Les redirections
            header('Location: supprimer\index.php');

        } else {
            echo 'Mot de passe incorrect';
            header('Location: index.php');
        }
    } else {
        echo 'Utilisateur non trouvé';
        header('Location: index.php');
    }
}
?>





