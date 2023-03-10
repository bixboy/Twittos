<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/body.css">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    
<div class="center1">
        <div class="center">
            <h1>Register</h1>
            <form action="proccess.php" method="POST" enctype="multipart/form-data">

                <div class="txt-field">
                    <input type="text" name="pseudo" id="pseudo" required>
                    <span></span>
                    <label>Username</label>
                </div>

                <div class="txt-field">
                    <input type="text" name="nom" id="nom" required>
                    <span></span>
                    <label>Name</label>
                </div>

                <div class="txt-field">
                    <input type="text" name="mail" id="mail" required>
                    <span></span>
                    <label>Mail</label>
                </div>

                <div class="txt-field">
                    <input type="password" name="password" id="password" required>
                    <span></span>
                    <label>Password</label>
                </div>

                <div class="txt-field">
                    <input type="file" name="picture" id="picture" required>
                    <span></span>
                    <label>Picture</label>
                </div>

                <div class="txt-field">
                    <input type="text" name="picture_url" id="picture_url" required>
                    <span></span>
                    <label>IMG URL</label>
                </div>

                <input type="submit" value="register">

                <div class="singup-link">
                    déja un compte ! <a href="..\index.php">Se connecter</a>
                </div>

                <script>
                    //Désactive soit l'upload de fichier soit l'URL si l'un des deux est choisi 
                    const picture = document.getElementById('picture');
                    const pictureUrl = document.getElementById('picture_url');
                    picture.addEventListener('change', () => {
                        if (picture.value !== '') {
                            pictureUrl.disabled = true;
                        } else {
                            pictureUrl.disabled = false;
                        }
                    });
                    pictureUrl.addEventListener('input', () => {
                        if (pictureUrl.value !== '') {
                            picture.disabled = true;
                        } else {
                            picture.disabled = false;
                        }
                    });

                    //Si les deux champs sont vides empêche l'envoi du formulaire
                    const form = document.querySelector('form');
                    form.addEventListener('submit', (event) => {
                        if (picture.value !== '' && pictureUrl.value !== '') {
                            event.preventDefault();
                        }
                    });
                </script>

            </form>
        </div>
    </div>

</body>
</html>