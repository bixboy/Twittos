<?php
require_once 'connexion.php';

//Vérifie si tous les champs ont été remplis
if($_POST['pseudo'] != "" && $_POST['mail'] != "" && $_POST['password'] != "" && $_POST['nom'] != "") {
    if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0) {
        
        // Affichage de l'image via UPLOAD
        $picture_path = 'uploads/' . basename($_FILES['picture']['name']);
        //Envoie le fichier dans le dossier uploads
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path)) {
            $data = [
                'pseudo' => $_POST['pseudo'],
                'nom' => $_POST['nom'],
                'mail' => $_POST['mail'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'picture' => $picture_path,
            ];
        } else {
            echo "Erreur de téléchargement de l'image.";
            exit;
        }


    } elseif(isset($_POST['picture_url']) && $_POST['picture_url'] != "") {
        
        // Affichage de l'image via URL
        $data = [
            'pseudo' => $_POST['pseudo'],
            'nom' => $_POST['nom'],
            'mail' => $_POST['mail'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'picture' => $_POST['picture_url'],
        ];
    } else {
        echo 'Veuillez remplir tous les champs';
        exit;
    }

    //Rentre dans la table user les informations
    $requete = $database->prepare('INSERT INTO users (pseudo, nom, mail, password, picture) VALUES (:pseudo, :nom, :mail, :password, :picture)');
    $result = $requete->execute($data);

    //Redirections
    if($result) {
        header('Location: ../index.php');
    } else {
        echo 'Une erreur est survenue';
    }
}
?>