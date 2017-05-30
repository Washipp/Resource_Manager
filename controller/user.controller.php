<?php
/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 14.05.17
 * Time: 13:17
 */
session_start();
require_once '../model/User.php';

$type = $_POST['type'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordRepeat = $_POST['passwordRepeat'];

if($type === 'login') {
    $r = new User();
    $passwordFromDatabase = $r->findPasswordByEmail($email);

    if(password_needs_rehash($passwordFromDatabase, PASSWORD_BCRYPT, ["cost" => 12]) && hash("sha512", $password) === $passwordFromDatabase){
        $newPasswordHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
        $r->setPasswordByEmail($email, $newPasswordHash);

        if(password_verify($password, $newPasswordHash)){
            $_SESSION['userid'] = $r->findIdByEmail($email);
            echo "Login was successful!";
        }else{
            echo "Password is incorrect";
        }
    }else{
        if(password_verify($password, $passwordFromDatabase)){
            $_SESSION['userid'] = $r->findIdByEmail($email);
            echo "Login was successful!";
        }
    }
    $r->unSetConnection();
}
else if($type === 'register'){
    if($password !== $passwordRepeat){
        echo "Password not the same.";
    }else{

        $u = new User();

        $newPasswordHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);

        $u->newUser($name, $email, $newPasswordHash, 1);

        $_SESSION['userid'] = $u->findIdByEmail($email);
        echo "Register was successful!";
        $r->unSetConnection();
    }
}

