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
$email = $_POST['email'];
$password = $_POST['password'];

switch ($type){
    case 'login':
        $r = new User();
        $passwordFromDatabase = $r->findPasswordByEmail($email);

        if(password_needs_rehash($passwordFromDatabase, PASSWORD_BCRYPT, ["cost" => 12]) && hash("sha512", $password) === $passwordFromDatabase){
            $newPasswordHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
            $r->setPasswordByEmail($email, $newPasswordHash);

            if(password_verify($password, $newPasswordHash)){
                $_SESSION['userId'] = $r->findIdByEmail($email);
                echo "Login was successful!";
            }else{
                echo "Password is incorrect";
            }
        }else{
            if(password_verify($password, $passwordFromDatabase)){
                $_SESSION['userId'] = $r->findIdByEmail($email);
                echo "Login was successful!";
            }else{
                echo "Password is incorrect";
            }
        }
        $r->unSetConnection();
        break;

    case 'register':
        $passwordRepeat = $_POST['passwordRepeat'];
        $name = $_POST['name'];
        if($password !== $passwordRepeat){
            echo "Password not the same.";
        }else{
            $u = new User();

            $newPasswordHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);

            $u->newUser($name, $email, $newPasswordHash, 1);

            $_SESSION['userId'] = $u->findIdByEmail($email);
            echo "Register was successful!";
            $r->unSetConnection();
        }
        break;
}

