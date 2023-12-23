<?php

/*function encodePwd(string $pwd){

    $salt = 'UnPeuDeSel123@';
    $encodedPwd = hash('sha1', $pwd.$salt);

    return $encodedPwd;
}*/

//fonction pour concatener le salt au mdp
function addSalt($passwordToSalt){
    $salt="unPeuDeSel123!";
    echo"<h4>Le salt est : $salt</h4>";
    $saltedPassword=$salt.$passwordToSalt.$salt;
    return $saltedPassword;
}

//fonction pour chiffrer/encoder le mdp
function encodePwd($saltedPassword){
    $encodePassword=sha1($saltedPassword);
    return $encodePassword;
}


?>