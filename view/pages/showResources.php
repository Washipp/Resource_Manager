
<div id='external-events'>
<?php
require_once 'model/Resource.php';

$r = new Resource();
$array =  $r->selectAllResources();

foreach($array as $key=>$val){
    echo "<div class='fc-event' id='".$val['id']."'>".$val['name'].": ".$val['description']."</div><br>";
}
?>
</div>
<div id="test"></div>
<div id='calendar'></div>
