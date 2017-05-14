<?php

/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 12.05.17
 * Time: 22:40
 */
class User extends Connection
{
    function __construct() {
        parent::__construct();
    }

    function newUser($name, $email, $password, $activated = 1, $salt){
        $stmt = $this->getConnection()->prepare( "
          INSERT INTO user
         (name, email, password, activated, salt)
          VALUES (?,?,?,?,?);");
        $stmt->bind_param('sssis', $name, $email, $password, $activated, $salt);
        $stmt->execute();
        $stmt->close();
        $this->getConnection()->close();
    }

    function setPasswordById($id, $newPassword){
        $stmt = $this->getConnection()->prepare("
          UPDATE user SET password = ? WHERE id_u = ?");
        $stmt->bind_param('si', $newPassword, $id);
        $stmt->execute();
        $stmt->close();
        $this->getConnection()->close();
    }

    function deactivateById($id){
        $stmt = $this->getConnection()->prepare("
          UPDATE user SET activated = 0 WHERE id_u = ?");
        $stmt->bind_param( 'i', $id);
        $stmt->execute();
        $stmt->close();
        $this->getConnection()->close();
    }

    function findPasswordByEmail($email){
        $stmt = $this->getConnection()->prepare("
          SELECT password FROM user WHERE email = ?");
        $stmt->bind_param( 's', $email);
        $stmt->execute();
        $stmt->bind_result($password);
        $stmt->fetch();
        $stmt->close();
        $this->getConnection()->close();
        return $password;
    }

    function findSaltByEmail($email){
        $stmt = $this->getConnection()->prepare( "
          SELECT salt FROM user WHERE email = ?");
        $stmt->bind_param( 's', $email);
        $stmt->execute();
        $stmt->bind_result($salt);
        $stmt->fetch();
        $stmt->close();
        $this->getConnection()->close();
        return $salt;
    }

    function findIdByEmail($email){
        $stmt = $this->getConnection()->prepare( "
          SELECT id_u FROM user WHERE email = ?");
        $stmt->bind_param( 's', $email);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->fetch();
        $stmt->close();
        $this->getConnection()->close();
        return $id;
    }

}