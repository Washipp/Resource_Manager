<?php

/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 12.05.17
 * Time: 22:40
 */
require_once 'Connection.php';

class User extends Connection
{
    function __construct()
    {
        parent::__construct();
    }

    function newUser($name, $email, $password, $activated = 1){
        $stmt = $this->getConnection()->prepare( "
          INSERT INTO user
         (name, email, password, activated)
          VALUES (?,?,?,?);
        ");
        $stmt->bind_param('sssi', $name, $email, $password, $activated);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            $stmt->close();
            return false;
        }
    }

    function showInformationById($id){
        $result = [];
        $stmt = $this->getConnection()->prepare("
            SELECT name, email, created FROM user WHERE u_id = ?;
        ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->bind_result($name,$email,$created);
        while($stmt->fetch()){
            $result = [
                "name" => $name,
                "email" => $email,
                "created" => $created
            ];
        }
        $stmt->close();
        return $result;
    }

    function setPasswordByEmail($email, $newPassword){
        $stmt = $this->getConnection()->prepare("
          UPDATE user SET password = ? WHERE email = ?;
        ");
        $stmt->bind_param('ss', $newPassword, $email);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            $stmt->close();
            return false;
        }
    }

    function setPasswordById($id, $newPassword){
        $stmt = $this->getConnection()->prepare("
          UPDATE user SET password = ? WHERE u_id = ?;
        ");
        $stmt->bind_param('si', $newPassword, $id);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            $stmt->close();
            return false;
        }
    }

    function setNameById($id, $newName){
        $stmt = $this->getConnection()->prepare("
          UPDATE user SET name = ? WHERE u_id = ?;
        ");
        $stmt->bind_param('si', $newName, $id);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            $stmt->close();
            return false;
        }
    }

    function deactivateById($id){
        $stmt = $this->getConnection()->prepare("
          UPDATE user SET activated = 0 WHERE u_id = ?;
        ");
        $stmt->bind_param( 'i', $id);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            $stmt->close();
            return false;
        }
    }

    function findPasswordByEmail($email){
        $stmt = $this->getConnection()->prepare("
          SELECT password FROM user WHERE email = ?;
        ");
        $stmt->bind_param( 's', $email);
        $stmt->execute();
        $stmt->bind_result($password);
        $stmt->fetch();
        $stmt->close();
        return $password;
    }


    function findIdByEmail($email){
        $stmt = $this->getConnection()->prepare("
          SELECT u_id FROM user WHERE email = ?;
        ");
        $stmt->bind_param( 's', $email);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->fetch();
        $stmt->close();
        return $id;
    }

}