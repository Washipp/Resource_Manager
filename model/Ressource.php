<?php

/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 12.05.17
 * Time: 22:40
 */
include_once 'Connection.php';

class Ressource extends Connection
{
    function __construct() {
        parent::__construct();
    }

    function newRessource($name, $description, $activated = 1){
        $stmt = $this->getConnection()->prepare( "
          INSERT INTO ressource
         (name, description, activated)
          VALUES (?,?,?);");
        $stmt->bind_param('ssi', $name, $description, $activated);
        $stmt->execute();
        $stmt->close();
        $this->getConnection()->close();
    }

    function showInfosById($id){
        $array = [];
        $stmt = $this->getConnection()->prepare( "
          SELECT name, description FROM ressource WHERE id_ress = ?;");
        $stmt->bind_param('i', $id );
        $stmt->execute();
        $stmt->bind_result($name, $description);
        while($stmt->fetch()){
            $result = [
                "name" => $name,
                "description" => $description
            ];
            $array[] = $result;
        }
        $stmt->close();
        $this->getConnection()->close();
        return $array;
    }

    function deactivateById($id){
        $stmt = $this->getConnection()->prepare( "
          UPDATE ressource SET activated = 0 WHERE id_ress = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
        $this->getConnection()->close();
    }

    function changeInfosById($id, $newName, $newDescription){
        $stmt = $this->getConnection()->prepare("
          UPDATE ressource SET name = ?, description = ? WHERE id_ress = ?");
        $stmt->bind_param('ssi', $newName, $newDescription, $id);
        $stmt->execute();
        $stmt->close();
        $this->getConnection()->close();
    }

    function selectAllRessources(){
        $array = [];
        $stmt = $this->getConnection()->prepare( "
          SELECT * FROM ressource ");
        $stmt->execute();
        $stmt->bind_result($id, $name, $description, $activated, $created);
        while($stmt->fetch()){
            $result = [
                "name" => $name,
                "description" => $description
            ];
            $array[] = $result;
        }
        $stmt->close();
        $this->getConnection()->close();
        return $array;
    }
}