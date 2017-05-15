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

    function newUser($name, $email, $password, $activated = 1){
        $stmt = $this->getConnection()->prepare( "
          INSERT INTO user
         (name, email, password, activated)
          VALUES (?,?,?,?);");
        $stmt->bind_param('sssi', $name, $email, $password, $activated);
        $stmt->execute();
        $stmt->close();
        $this->getConnection()->close();
    }

    function setPasswordByEmail($email, $newPassword){
        $stmt = $this->getConnection()->prepare("
          UPDATE user SET password = ? WHERE email = ?");
        $stmt->bind_param('si', $newPassword, $email);
        $stmt->execute();
        $stmt->close();
        $this->getConnection()->close();
    }

    function deactivateById($id){
        $stmt = $this->getConnection()->prepare("
          UPDATE user SET activated = 0 WHERE u_id = ?");
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


    function findIdByEmail($email){
        $stmt = $this->getConnection()->prepare( "
          SELECT u_id FROM user WHERE email = ?");
        $stmt->bind_param( 's', $email);
        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->fetch();
        $stmt->close();
        $this->getConnection()->close();
        return $id;
    }

}