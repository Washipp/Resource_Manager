<?php
/**
 * Created by PhpStorm.
 * User: silasmeier
 * Date: 13.05.17
 * Time: 18:30
 */
include 'model/Ressource.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $description = $_POST['description'];

    $r = new Ressource();

    $r->newRessource($name, $description);

    header('Location: addressource');
}