<?php
/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 14.05.17
 * Time: 13:17
 */
session_start();
include 'model/Resource.php';
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $r = new User();


    $passwordFromDatabase = $r->findPasswordByEmail($email);

    if(password_needs_rehash($passwordFromDatabase, PASSWORD_BCRYPT, ["cost" => 12]) && hash("sha512", $password) === $passwordFromDatabase){
        $newPasswordHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
        $r->setPasswordByEmail($email, $newPasswordHash);

        if(password_verify($password, $newPasswordHash)){
            $_SESSION['userid'] = $r->findIdByEmail($email);
            header('Location: login?success=true');
        }else{
            header('Location: login?success=false');
        }
    }else{
        if(password_verify($password, $passwordFromDatabase)){
            $_SESSION['userid'] = $r->findIdByEmail($email);
            header('Location: login?success=true');
        }else{
            header('Location: login?success=false');
        }
    }
}
else if(isset($_POST['register'])){

}
