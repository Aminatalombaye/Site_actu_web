<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #b7b7b7;
            border-radius: 5px;
            background-color: #f8f8f8; 
        }

        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        form input[type="email"],
        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }

        form input[type="submit"] {
            background-color: #0080ff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body style="background-color: #f3f3f3;">
    <br>
    <br>
    
    <h1 align="center">ACTUALITÉS POLYTHECHNICIENNES</h1> 
    
    <br>
    <br>
   <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
</head>
<body>
    <h1 align="center">Inscription</h1>
    <form action="http://localhost/mglsi_actu/index.php?action=register" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="confirm_password">Confirmer le mot de passe :</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>

