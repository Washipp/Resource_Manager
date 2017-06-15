<?php
require_once 'model/Resource.php';

$r = new Resource();
$array =  $r->selectAllResources();

foreach($array as $key=>$val){
    foreach($val as $k=>$v){
        echo $v . '  ';
    }
    echo '<br />';
}
