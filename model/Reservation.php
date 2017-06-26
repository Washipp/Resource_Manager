<?php

/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 12.05.17
 * Time: 22:41
 */
class Reservation extends Connection
{
    function __construct() {
        parent::__construct();
    }

    function newReservation($id_u, $id_reso, $start_date, $end_date){

    }

    function getReservationById($id){
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

    function updateReservation($id_reso, $start_date, $end_date){

    }

}