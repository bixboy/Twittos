<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/body.css">
</head>
<body>

<div class="center1">
        <div class="center">
            <h1>Login</h1>
            <form  action="proccess.php" method="POST">

                <div class="txt-field">
                    <input type="text" name="pseudo" id="pseudo" required>
                    <span></span>
                    <label>Username</label>
                </div>

                <div class="txt-field">
                    <input type="password" name="password" id="password" required>
                    <span></span>
                    <label>Password</label>
                </div>

                <div class="pass">Mot de passe perdu ?</div>

                <input type="submit" value="login">
                
                <div class="singup-link">
                    Pas de compte? <a href="register\index.php">S'enregistrer</a>
                </div>

            </form>
        </div>
    </div>

</body>
</html>