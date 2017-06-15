<?php
/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 14.05.17
 * Time: 13:18
 */

session_start();
require_once '../model/User.php';

$type = $_POST['type'];


switch ($type){
    case 'changeName':
        $name = $_POST['name'];

        $u = new User();

        if(isset($name)) {
            $u->setNameById($_SESSION['userId'], $name);
        }

        echo "Name change was successful!";
        $r->unSetConnection();
        break;

    case 'changeEmail':

        break;

    case 'changePassword':
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];

        if($password !== $passwordRepeat){
            echo "Password are not identical.";
        }else{
            $u = new User();

            $newPasswordHash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);

            if($u->setPasswordById($_SESSION['userId'], $newPasswordHash)){
                echo "Changing Password was successful!";
            }else{
                echo "An error occurred. Try again";
            }


            $u->unSetConnection();
        }
        break;
}

