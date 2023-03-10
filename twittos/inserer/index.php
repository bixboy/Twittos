<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/body.css">
    <link rel="stylesheet" href="../css/inserer.css">
</head>
<body>
    <form action="proccess.php" method="POST" class="box">

        <div class="box_int">
            <div class="titre">
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title" oninput="this.value = this.value.toLowerCase();" maxlength="21" required>
            </div>

            <div class="contenu">
            <label for="content">Contenu :</label>
            <textarea name="content" id="content" cols="30" rows="10" required></textarea>
            </div>

            <div class="envoi">
            <input type="submit" value="Envoyer">
            <br>
            <a href="..\supprimer\index.php" class="box_voir">Voir les messages</a>
            </div>
        </div>

    </form>

</body>
</html>