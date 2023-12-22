<a href="../">Accueil</a>
<h2>Login result</h2>
<?php

require_once '../fonctions/userCrud.php';
require_once '../fonctions/validation.php';
// require_once '../utils/connexion.php';

var_dump($_POST);

//Authentification

if (isset($_POST)) {

    //vérifier si username dans DB
    if (!empty($_POST['user_name'])) {
       $userData = getUserByUsername($_POST['user_name']);
    } else {
        //Erreur rien entré
        //redirect vers login
        $url = '../page/index.php';
        header('Location: ' . $url);
    }

    
    //si l'utilisateur exist dans la DB
    if ($userData) {
        
       $enteredPwdEncoded = encodePwd($_POST['pwd']);
       $data =[
        'id'=>$userData['id'],
        'token'=>$token
       ];
       $ajouterToken = changeToken($data);
        if ($userData['pwd'] == $enteredPwdEncoded) {
            $_SESSION['auth']=[
                'id'=>$userData['id'],
                'role_id'=>$userData['role_id'],
                'token'=>$token
            ];

            $token = hash('sha256', random_bytes(32));
            echo '</br></br>Mon token : </br>';
            
            var_dump($token);
            //enregistrer le token en Session et dans la DB

            echo "C'est le bon mdp ";
        }else {
            echo "C'est pas le bon mdp ";        }
    }
} else {
    //redirige vers login
    $url = '../results.php';
    header('Location: ' . $url);
}










?>