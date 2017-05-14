<?php

/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 12.05.17
 * Time: 22:44
 */
abstract class Connection
{
    private $connection;

    function __construct()
    {
        $this->connection = $this->connectToDb();
    }

    function connectToDb(){
        $serverName = "localhost";
        $userName = "root";
        $password = "root";
        $dbName = "Ressource_Manger";

        $conn =  new mysqli($serverName, $userName, $password, $dbName );
        if (mysqli_connect_errno()) {
            printf("Verbindung fehlgeschlagen: %s\n", mysqli_connect_error());
            exit();
        }

        mysqli_set_charset ( $conn, "utf8" );
        return $conn;
    }

    function getConnection(){
        return $this->connection;
    }
}