<?php
/**
 * Created by PhpStorm.
 * User: Silas
 * Date: 21.06.2017
 * Time: 19:09
 */
/*session_start();
require_once '../model/Reservation.php';

$result = [
    'name' => 'event1',
    'start' => '2017-01-09T12:30:00',
    'end' => '2017-01-11T14:30:00',
];*/

/*$test = '
<event>
    <title>Event1</title>
    <start>2017-06-09</start>
    <end>2017-06-10</end>
</event>
';*/


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

echo json_encode($json_array);

/*
$type = $_POST['type'];
$type = 'getReservations';

if($type == 'getReservations'){

    $r = new Reservation();

    $r->getReservationById(1);

    $r->unSetConnection();

    $result = [
        'name' => 'event1',
        'start' => '2017-01-09T12:30:00',
        'end' => '2017-01-11T14:30:00',
    ];

    return $result;

}else {
    echo 'Nothing';
}*/