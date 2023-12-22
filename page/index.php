<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire d'Adresse</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>

<h2>Bienvenue sur notre site de vente</h2>


<!-- 
    Formulaire permettant d'enregistrer un nouvel utilisateur
 -->
<form method="post" action="../valide/loginValid.php">
    <input hidden name="action" value="signup">
    <label for="user_name">Nom d'utilisateur</label>
    <input id="user_name" name="user_name" type="text"><br><br>
    <label for="email">Email</label>
    <input id="email" name="email" type="email"><br><br>
    <label for="pwd">Mot de passe</label>
    <input id="pwd" name="pwd" type="password"><br><br>
    <button type="submit">S'enregistrer</button><br>
</form>

    </body>
</html>