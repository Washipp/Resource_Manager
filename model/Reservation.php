<?php

/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 12.05.17
 * Time: 22:41
 */
require 'Connection.php';

class Reservation extends Connection
{
    function __construct() {
        parent::__construct();
    }

    function newReservation($id_u, $id_reso, $start_date, $end_date){
        $stmt = $this->getConnection()->prepare("
        INSERT INTO reservation (id_u, id_reso, start_date, end_date) VALUES (?,?,?,?); 
        ");
        $stmt->bind_param('iiss', $id_u, $id_reso, $start_date, $end_date);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            $stmt->close();
            return false;
        }
    }

    function getReservationById($id){
        $array = [];
        $stmt = $this->getConnection()->prepare( "
          SELECT rese_id, title, start_date, end_date, description FROM reservation LEFT JOIN resource ON reservation.id_reso = resource.reso_id WHERE rese_id = ?;
          ");
        $stmt->bind_param('i', $id );
        $stmt->execute();
        $stmt->bind_result($id, $title, $start, $end, $description);
        while($stmt->fetch()){
            $result = [
                'id' => $id,
                'title' => $title,
                'start' => $start,
                'end' => $end,
                'description' => $description
            ];
            $array[] = $result;
        }
        $stmt->close();

        return $array;
    }

    function getAllReservation(){
        $array = [];
        $stmt = $this->getConnection()->prepare("
        SELECT rese_id, title, start_date, end_date, description FROM reservation LEFT JOIN resource ON reservation.id_reso = resource.reso_id;
        ");
        $stmt->execute();
        $stmt->bind_result($id, $title, $start, $end, $description);
        while($stmt->fetch()){
            $result = [
                'id' => $id,
                'title' => $title,
                'start' => $start,
                'end' => $end,
                'description' => $description
            ];
            $array[] = $result;
        }

        return $array;
    }

    function updateReservation($id_rese, $start_date, $end_date){
        $stmt = $this->getConnection()->prepare("
        UPDATE reservation SET start_date = ?,end_date = ? WHERE rese_id = ?;
        ");
        $stmt->bind_param('ssi',$start_date, $end_date, $id_rese);
        if($stmt->execute()){
            $stmt->close();
            return true;
        }else{
            $stmt->close();
            return false;
        }
    }

}