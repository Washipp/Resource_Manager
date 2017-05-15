<?php
/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 13.05.17
 * Time: 18:30
 */
include 'model/Resource.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $description = $_POST['description'];

    $r = new Resource();

    $r->newResource($name, $description);

    header('Location: addresource');
}