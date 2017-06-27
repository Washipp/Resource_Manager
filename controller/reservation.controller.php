<?php
/**
 * Created by PhpStorm.
 * User: Silas
 * Date: 21.06.2017
 * Time: 19:09
 */
session_start();
require_once '../model/Reservation.php';

if(!isset($_SESSION['userId'])){
    echo 'Please login first';
}else {

    $type = $_POST['type'];
    //TODO Delete Reservation
    switch ($type) {
        case 'getReservations':
            $r = new Reservation();

            $result = $r->getAllReservation();

            echo json_encode($result);

            $r->unSetConnection();
            break;
        case 'updateReservation':
            $id_rese = $_POST['id_rese'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $r = new Reservation();

            if ($r->updateReservation($id_rese, $start_date, $end_date)) {
                echo 'Update worked';
            } else {
                echo 'An Error occurred while updating. Please try again';
            }

            $r->unSetConnection();

            break;

        case 'addNewReservation':
            $id_u = $_SESSION['userId'];
            $id_reso = $_POST['id_reso'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $r = new Reservation();

            if ($r->newReservation($id_u, $id_reso, $start_date, $end_date)) {
                echo 'Successfully reserved';
            } else {
                echo 'An Error occurred while adding. Please try again';
            }

            break;
        default:
            echo 'Error occurred';
            break;
    }
}