<?php

function usernameIsValid(string $username): array
{
    $result = [
        'isValid' => true,
        'msg' => ''

    ];

    $userInDB = getUserByUsername($username);

    if (strlen($username) < 2) {
        $result = [
            'isValid' => false,
            'msg' => "Votre nom d'utilisateur doit avoir au moins deux caracteres"

        ];
    } elseif (strlen($username) > 20) {
        $result = [
            'isValid' => false,
            'msg' => "Votre nom d'utilisateur est beaucoup trop long. Veuillez entrez un nom avec maximum 20 caracteres"

        ];
    } elseif ($userInDB) {
        $result = [
            'isValid' => false,
            'msg' => "Le nom d'utilisateur entre est deja utilise"
        ];
    }
    return $result;
}

function emailIsValid($email)
{

    $emailValidationRegex = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
    if (!preg_match($emailValidationRegex, $email)) {
        return [
            'isValid' => false,
            'msg' => "L'Email n'est pas valide",
        ];
    }
    return [
        'isValid' => true,
        'msg' => '',
    ];
}

function nomIsValid($lname){
    //minimum 6 max 16
    $length = strlen($lname);

    if ($length < 2) {
        return [
            'isValid' => false,
            'msg' => "Votre nom doit avoir au moins deux caracteres"
        ];
    } elseif ($length > 20) {
        return [
            'isValid' => false,
            'msg' => 'Votre nom est beaucoup trop long. Veuillez entrez un nom avec maximum 20 caracteres'
        ];
    }
    return [
        'isValid' => true,
        'msg' => ''
    ];
}

function prenomIsValid($fname){
    $length = strlen($fname);

    if ($length < 2) {
        return [
            'isValid' => false,
            'msg' => 'Votre prenom doit avoir au moins deux caracteres'
        ];
    } elseif ($length > 20) {
        return [
            'isValid' => false,
            'msg' => 'Votre nom est beaucoup trop long. Veuillez entrez un nom avec maximum 20 caracteres'
        ];
    }
    return [
        'isValid' => true,
        'msg' => ''
    ];
}

function pwdLenghtValidation($pwd)
{
    //minimum 6 max 16
    $length = strlen($pwd);

    if ($length < 6) {
        return [
            'isValid' => false,
            'msg' => 'Votre mot de passe doit avoir au moins six caracteres'
        ];
    } elseif ($length > 16) {
        return [
            'isValid' => false,
            'msg' => 'Votre mot de passe est beaucoup trop long. Veuillez entrez un mot de passe avec maximum 16 caracteres'
        ];
    }
    return [
        'isValid' => true,
        'msg' => ''
    ];
}