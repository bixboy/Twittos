<?php
    require_once 'connexion.php';

    //Démarre la session
    session_start();

    //Détruit la session
    session_destroy();

    //Redirige vers la page de connexion
    header('Location: ../index.php');
    exit;
?>