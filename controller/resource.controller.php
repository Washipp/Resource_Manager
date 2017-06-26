<?php
/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 13.05.17
 * Time: 18:30
 */
session_start();
require_once '../model/Resource.php';

$type = $_POST['type'];

if($type == 'getResources'){

    $r = new Resource();

}else{
    $title = $_POST['title'];
    $description = $_POST['description'];

    $r = new Resource();

    $r->newResource($title, $description);
    //TODO: Check if Resource got added.
    echo 'Resource successfully added.';

    $r->unSetConnection();
}

