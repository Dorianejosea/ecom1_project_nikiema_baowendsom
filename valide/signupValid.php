<a href="../">Accueil</a>
<?php

require_once '../fonctions/validation.php';
require_once '../fonctions/userCrud.php';
require_once '../utils/connexion.php';
require_once '../fonctions/encode.php';

session_start();

// Todo : valider les données de mon form 
// si les données ne sont pas bonne : renvoyer vers le form d'enregistrement (redirect auto )
// attention on veut récupérer les données rentrées précédement : $_SESSION

//var_dump($_POST);



if (isset($_POST)) {
    $_SESSION['signup_form'] = $_POST;

    unset($_SESSION['signup_errors']);



    $fieldValidation = true;
    // valid user name
    if (isset($_POST['user_name'])) {
        $nameIsValidData = usernameIsValid($_POST['user_name']);
        if ($nameIsValidData['isValid'] == false) {
            var_dump("Erruer dans username");
            $fieldValidation = false;
        }
    }

    //valid email
    if (isset($_POST['user_name'])) {
        $emailIsValidData = emailIsValid($_POST['email']);

        if ($emailIsValidData['isValid'] == false) {
            var_dump("Erruer dans email");

            $fieldValidation = false;
        }
    }
    // valid mdp
    if (isset($_POST['user_name'])) {
        $pwdIsValidData = pwdLenghtValidation($_POST['pwd']);

        if ($pwdIsValidData['isValid'] == false) {
            var_dump("Erruer dans pwd");

            $fieldValidation = false;
        }
    }

    if ($fieldValidation == true) {
        //envoyer à la DB

        $encodedPwd = encodePwd($_POST['pwd']);
        $data = [
            'user_name' => $_POST['user_name'],
            'email' => $_POST['email'],
            'pwd' => $encodedPwd
        ];
        //$newUser = createUser($data);
    } else {
        // redirect to signup et donner les messages d'erreur
        $_SESSION['signup_errors'] = [
            'user_name' => $nameIsValidData['msg'],
            'email' => $emailIsValidData['msg'],
            'pwd' => $pwdIsValidData['msg']
        ];
        $url = '../page/entree.php';
        header('Location: ' . $url);
    }
} else {
    //redirect vers signup
    $url = '../page/entree.php';
    header('Location: ' . $url);
}


if (isset($_POST)) {
 
    $_SESSION["signup_form"] = $_POST;
 
    unset($_SESSION['signup_errors']);
 
    $fieldIsValid = true;
    if (isset($_POST["user_name"])) {
        $validUserName = userNameIsValid($_POST["user_name"]);
 
        if ($validUserName['isValid'] == false) {
            $fieldIsValid = false;
            // die("je die dans mon valid UserName");
        }
    }
 
    if (isset($_POST["user_name"])) {
        $validEmail = emailIsValid($_POST["email"]);
 
        if ($validEmail['isValid'] == false) {
            $fieldIsValid = false;
            // die("je die dans mon valid Email");
        }
    }
 
    if (isset($_POST["user_name"])) {
        $validpwd = pwdLenghtValidation($_POST["pwd"]);
 
        if ($validpwd['isValid'] == false) {
            $fieldIsValid = false;
            //die("je die dans mon valid pwd");
        }
    }
 
    if (isset($_POST["user_name"])) {
        $validfname = prenomIsValid($_POST["fname"]);
 
        if ($validfname['isValid'] == false) {
            $fieldIsValid = false;
            // die("je die dans mon valid Fname");
        }
    }
    if (isset($_POST["user_name"])) {
        $validlname = nomIsValid($_POST["lname"]);
 
        if ($validlname['isValid'] == false) {
            $fieldIsValid = false;
            // die("je die dans mon valid Lname");
        }
    }
 $token = hash('sha256', random_bytes(32));
    if ($fieldIsValid == true) {
        //envoyer à la DB
 
        $encodedPwd = encodePwd($_POST['pwd']);
        
        $data = [
            'user_name' => $_POST['user_name'],
            'email' => $_POST['email'],
            'pwd' => $encodedPwd,
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'billing_address_id' => 1,
            'shipping_address_id' => 1,
            'token' => $token,
            'role_id' => 3
        ];
        var_dump($data);
        
        $_SESSION["session_token"] = $token;
        $newUser = createUser($data);
    } else {
        // redirect to signup and give errors message
        $_SESSION['signup_errors'] = [
            'user_name' => $validUserName['msg'],
            'email' => $validEmail['msg'],
            'pwd' => $validpwd['msg'],
            'fname' => $validfname['msg'],
            'lname' => $validlname['msg']
 
        ];
        $url = '../page/entree.php';
        header('Location: ' . $url);
    }
} else {
    //redirect to the  signup
    $url = '../page/entree.php';
    header('Location: ' . $url);
}
 
?>

<a href="../produit/pageProduits.php">
    <button>Valider mes informations</button>
</a>
<a href="../index.php">Rettour a la page d'Accueil</a>
