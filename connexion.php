<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style/connexion.css">
    <link rel="stylesheet" href="Style\global.css">
</head>
<body>
    <div class="container" id="Login">
        <div class="box form-box">
            <header>Se connecter</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required>
                </div>
                <div class="field input">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submitConnexion" value="Se connecter" required>
                </div>
                <div class="links">
                    Vous n'avez pas encore de compte ? <a href="#" onclick="toggleSection('SignUp');">S'inscrire</a>
                </div>
            </form>
        </div>
    </div>

    <div class="container hidden" id="SignUp">
        <div class="box form-box">
            <header>S'inscrire</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submitInscription" value="S'inscrire" required>
                </div>
                <div class="links">
                    Déjà membre ? <a href="#" onclick="toggleSection('Login');">Se connecter</a>
                </div>
            </form>
        </div>
    </div>

    <script src="Script/connexion.js"></script>
</body>
</html>
