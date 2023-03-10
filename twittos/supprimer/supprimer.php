<?php
require_once 'connexion.php';
session_start();


if(isset($_GET['id'])) {
    $data = [
        'id' => $_GET['id']
    ];

    // Récupére l'article a supprimer
    $requete = $database->prepare('SELECT * FROM articles WHERE id = :id');
    $requete->execute($data);
    $article = $requete->fetch();

    // Vérifie si l'utilisateur connecté et est l'auteur de l'article
    if(isset($_SESSION['user']) && $article['user_id'] == $_SESSION['user']['id']) {
        // Supprime l'article
        $requete = $database->prepare('DELETE FROM articles WHERE id = :id');
        $result = $requete->execute($data);
        header('Location: index.php');
    }
}
?>