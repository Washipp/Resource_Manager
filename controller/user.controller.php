<?php
/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 14.05.17
 * Time: 13:17
 */
session_start();
include 'model/Resource.php';
include 'model/User.php';

if(isset($_POST['login'])) {
    $emailLogin = $_POST['emailLogin'];
    $passwordLogin = $_POST['passwordLogin'];

    $r = new User();

    $passwordFromDatabase = $r->findPasswordByEmail($emailLogin);

    if(password_needs_rehash($passwordFromDatabase, PASSWORD_BCRYPT, ["cost" => 12]) && hash("sha512", $passwordLogin) === $passwordFromDatabase){
        $newPasswordHash = password_hash($passwordLogin, PASSWORD_BCRYPT, ["cost" => 12]);
        $r->setPasswordByEmail($emailLogin, $newPasswordHash);

        if(password_verify($passwordLogin, $newPasswordHash)){
            $_SESSION['userid'] = $r->findIdByEmail($emailLogin);
            header('Location: login?success=true');
        }else{
            header('Location: login?success=false');
        }
    }else{
        if(password_verify($passwordLogin, $passwordFromDatabase)){
            echo $r->findPasswordByEmail($emailLogin);
            $_SESSION['userid'] = $r->findIdByEmail($emailLogin);
            header('Location: login?success=true');
        }else{
            header('Location: login?success=false');
        }
    }
}
else if(isset($_POST['register'])){
    $name = $_POST['name'];
    $emailRegister = $_POST['emailRegister'];
    $passwordRegister = $_POST['passwordRegister'];
    $passwordRepeat = $_POST['passwordRepeat'];

    if($passwordRegister !== $passwordRepeat){

        header('Location: login?success=false');
    }else{

        $u = new User();

        $newPasswordHash = password_hash($passwordRegister, PASSWORD_BCRYPT, ["cost" => 12]);

        $u->newUser($name,$emailRegister , $newPasswordHash, 1);

        $_SESSION['userid'] = $u->findIdByEmail($emailRegister);
        header('Location: login?success=true');
    }



}
