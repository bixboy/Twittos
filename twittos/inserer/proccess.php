<?php
    require_once 'connexion.php';
    session_start();

    if($_POST['title'] != '' && $_POST['content']!=""){

        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'date' => date('Y-m-d H:i:s'),
            'user_id' => $_SESSION['user']['id']
        ];
        
        $requete = $database ->prepare('INSERT INTO articles (title, content, date, user_id) VALUES (:title, :content, :date, :user_id)');
        $requete->execute($data);

        if($requete) {
            echo "Votre article a bien été ajouté"; 
            
            //redirection vers la page principale
            header('Location: ../supprimer\index.php');
        } else {
            echo "Une erreur est survenue";
        }
    }
    else{
        echo "Veuillez remplir tous les champs";
        header('Location: index.php');
    }
?>