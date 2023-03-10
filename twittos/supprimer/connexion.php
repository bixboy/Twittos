<?php
    try {
        $database = new PDO('mysql:host=localhost;dbname=twittos', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
?>