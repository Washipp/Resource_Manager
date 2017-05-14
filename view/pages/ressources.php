<?php
include_once 'model/Ressource.php';
$r = new Ressource();
$array =  $r->selectAllRessources();

foreach($array as $key=>$val){
    foreach($val as $k=>$v){
        echo $v . '  ';
    }
    echo '<br />';
}
?>