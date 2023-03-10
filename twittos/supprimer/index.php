<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/body_articles.css">
    <link rel="stylesheet" href="../css/articles.css">
</head>
<body class="body">

        <!-- Barre de recherche -->
        <form action="" method="GET">
            <div class="box_search">
                <input type="text" name="search" class="txt_search">
                <button type="submit" class="search">Recherche</button>
            </div>
        </form>
    

    <div class="box_all">
    <?php
        require_once 'connexion.php';
        session_start();

        //Lier le user a son poste
        $sql = 'SELECT articles.*, users.pseudo, users.nom, users.picture FROM articles LEFT JOIN users ON articles.user_id = users.id';

        // Vérifier si une recherche a été effectuée
        if(isset($_GET['search']) && !empty($_GET['search'])) {
            $keywords = $_GET['search'];
            $sql .= ' WHERE title LIKE :keywords OR content LIKE :keywords';
        }

        // Trié par date
        $sql .= ' ORDER BY date DESC';

        $requete = $database->prepare($sql);

        // Lier les paramètres de recherche à la requête
        if(isset($keywords)) {
            $requete->bindValue(':keywords', '%'.$keywords.'%');
        }

        $requete->execute();
        $articles = $requete->fetchAll(PDO::FETCH_ASSOC);

        foreach($articles as $article) { 

            // Vérifier si l'utilisateur connecté et est l'auteur de l'article pour faire apparaitre le bouton supp
            $showDeleteButton = false;
            if(isset($_SESSION['user']) && $article['user_id'] == $_SESSION['user']['id']) {
                $showDeleteButton = true;
            }
    ?>
            <!-- HTML des postes -->
            <div class="box">

                <div class="box_user">
                    <h2 class="pseudo"><?php echo $article['pseudo']; ?></h2>
                    <p class="name_user"><?php echo $article['nom']; ?></p>
                    <img src="<?php echo $article['picture']; ?>" alt="Image de profil" class="img_user">
                </div>

                <div class="box_articles">
                    <h2><?php echo $article['title']; ?></h2>
                    <p class="content"><?php echo $article['content']; ?></p>
                    <span><?php echo $article['date']; ?></span>

                    <!-- Faire apparaitre ou disparaitre le bouton supp -->
                    <?php if($showDeleteButton): ?>

                    <div class="box_supp">
                        <a href="supprimer.php?id=<?php echo $article['id'] ?>" class="supp">Supprimer</a>
                    </div>

                    <?php endif; ?>

                </div>

            </div>
                    
    <?php } ?>
        </div>


    <div class="box_envoi">
        <a href="..\inserer\index.php">Envoyer un message</a>
    </div>


    <?php

        //Récupére le pseudo du user et son id depuis la session et que s'il est co ou pas alors faire apparaitre le bouton déco ou connexion
        if(isset($_SESSION['user']) && isset($_SESSION['user']['pseudo'])){
        echo '<span>Bienvenue, '.$_SESSION['user']['pseudo'].' !</span>';
        echo '<span>ID : '.$_SESSION['user']['id'].'</span><br>';
            echo '<form action="logout.php" method="POST"><button type="submit" name="logout" class="deco">Déconnexion</button></form>';
        } else {
            echo '<a href="../index.php" class="deco">Connexion</a>';
        }
    ?>

    <?php
        // Récupérer le chemin d'accès à l'image depuis la base de données
        $requete = $database->prepare('SELECT picture FROM users WHERE id = :id');
        $requete->bindParam(':id', $_SESSION['user']['id']);
        $requete->execute();
        $user = $requete->fetch();
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/twittos/register/' . $user['picture'];
        $imagePath = $user['picture'];
    ?>
    <img src="<?php echo $imagePath; ?>" alt="Image" type="image/png" class="img_avatar">


</body>
</html>