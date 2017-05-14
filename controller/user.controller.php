<?php
/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 14.05.17
 * Time: 13:17
 */
session_start();
include 'model/Ressource.php';
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $r = new User();

    $userPassword = $r->findPasswordByEmail($email);

    $hashedPassword = hashingPassword($password, $r->findSaltByEmail($email));

    if($userPassword == $hashedPassword){
        $_SESSION['userid'] = $r->findIdByEmail($email);
        header('Location: login?success=true');
    }else{
        header('Location: login?success=false');
    }
}
else if(isset($_POST['register'])){

}

function hashingPassword($password, $salt){


    return $password;
}