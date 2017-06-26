<?php
/**
 * Created by PhpStorm.
 * User: Silas
 * Date: 21.06.2017
 * Time: 19:09
 */
session_start();
require_once '../model/Reservation.php';

$json_array = array(

    array(
        'title' => 'event1',
        'start' => date_format(new DateTime('2017-06-09'), 'c'),
        'end' => date_format(new DateTime('2017-06-10'), 'c')
    ),

    //2nd record
    array(
        'title' => 'event2',
        'start' => date_format(new DateTime('2017-06-12'), 'c'),
        'end' => date_format(new DateTime('2017-06-13'), 'c')
    )

);

//echo json_encode($json_array);

$type = $_POST['type'];

switch ($type){
    case 'getReservations':
        $r = new Reservation();

        $result  = $r->getReservationById(1);

        $r->unSetConnection();

        echo json_encode($result);
        break;
    case 'updateReservation':
        $id_reso = $_POST['id_reso'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        $r = new Reservation();

        if($r->updateReservation($id_reso, $start_date,$end_date)){
            echo 'Update worked';
        }else{
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

        if($r->newReservation($id_u, $id_reso,$start_date, $end_date)){
            echo 'Successfully reserved';
        }else{
            echo 'An Error occurred while adding. Please try again';
        }

        break;
    default:
        echo 'Error occurred';
        break;
}