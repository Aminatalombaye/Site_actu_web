

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: #f3f3f3;">
    <br>
    <br>
    
    <h1 align="center">ACTUALITÉS POLYTHECHNICIENNES</h1> 
    
    <br>
    <br>
    <h1 align="center">Connexion</h1>
    <form action="index.php?action=login" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form>

    <div class="inscription-btn">
        <a href="views/registration.php">S'inscrire</a>
    </div>
</body>
</html>
