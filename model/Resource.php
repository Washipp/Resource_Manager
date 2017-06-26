<?php

/**
 * Created by PhpStorm.
 * User: Silas
 * Date: 15.05.2017
 * Time: 20:35
 */
require 'Connection.php';

class Resource extends Connection
{
    function __construct() {
        parent::__construct();
    }

    function newResource($name, $description, $activated = 1){
        $stmt = $this->getConnection()->prepare( "
          INSERT INTO resource
         (title, description, activated)
          VALUES (?,?,?);");
        $stmt->bind_param('ssi', $name, $description, $activated);
        $stmt->execute();
        $stmt->close();
    }

    function showInfosById($id){
        $array = [];
        $stmt = $this->getConnection()->prepare( "
          SELECT title, description FROM resource WHERE reso_id = ?;");
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

        return $array;
    }

    function deactivateById($id){
        $stmt = $this->getConnection()->prepare( "
          UPDATE resource SET activated = 0 WHERE reso_id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();

    }

    function changeDescriptionById($id, $newDescription){
        $stmt = $this->getConnection()->prepare("
          UPDATE resource SET description = ? WHERE reso_id = ?");
        $stmt->bind_param('si', $newDescription, $id);
        $stmt->execute();
        $stmt->close();

    }

    function changeTitleById($id, $newName){
        $stmt = $this->getConnection()->prepare("
          UPDATE resource SET title = ? WHERE reso_id = ?");
        $stmt->bind_param('si', $newName, $id);
        $stmt->execute();
        $stmt->close();

    }

    function selectAllResources(){
        $array = [];
        $stmt = $this->getConnection()->prepare( "
          SELECT * FROM resource ");
        $stmt->execute();
        $stmt->bind_result($id, $name, $description, $activated, $created);
        while($stmt->fetch()){
            $result = [
                'id' => $id,
                'name' => $name,
                'description' => $description
            ];
            $array[] = $result;
        }
        $stmt->close();
        return $array;
    }
}