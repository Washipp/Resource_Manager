<?php

/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 12.05.17
 * Time: 22:41
 */
class Kategory extends Connection
{
    function __construct() {
        parent::__construct();
    }

    function addNewKategory( $title, $description){
        $stmt = $this->getConnection()->prepare( "INSERT INTO kategory (infos, title) VALUES (?,?);");
        $stmt->bind_param( 'ss', $description, $title);
        $stmt->execute();
        $stmt->close();
        $this->getConnection()->close();
    }
}