<?php

/*if (isset($_POST)) {
    echo'<br><br>';
    var_dump($_POST);
    echo'<br><br>';
    switch ($_POST['action']) {
      case 'signup':
        //Validation des data dans $_POST
  $isValid =true;
  
  // username, email, pwd
  if (isset($_POST['user_name'])) {
    $usernameIsValidData = usernameIsValid($_POST['user_name']);
  echo '<br><br>';
    var_dump($usernameIsValidData);
  }

  $newUserData = [
    'user_name'=>$_POST['user_name'],
    'email'=>$_POST['email'],
    'pwd'=>$_POST['pwd'],
  ];
  // creation d'un user dans la DB
if ($isValid) {
echo '<br><br> Ça a marché je devrai avoir un user en plus';

createUser($newUserData);
}else {
//redirect vers signUp page
header('Location: ../pages/signup.php');
exit;}
  

$users = getAllUsers();

?>
<a href="../pages/signUp.php">Retour a la page Enregistrement</a>
<?php
showData('Mes users avec le nouveau',$users);
  break;
case 'login':
  # code...
  break;
default:
  // redirect vers index
  break;
}
} else { //else de if isset $_POST
// redirect vers index.php
header('Location: ../index.php');
exit;
}


?>