
<div id='external-events'>
<?php
require_once 'model/Resource.php';
//TODO change to ajax, usage of controller
$r = new Resource();
$array =  $r->selectAllResources();

foreach($array as $key=>$val){
    echo "<div class='fc-event' id='".$val['id']."'>".$val['name'].": ".$val['description']."</div><br>";
}
?>
</div>
<div class="ui-widget">
    <div class="ui-corner-all" id="infoBox" style="padding: 0 .7em; display: none">
        <p>
            <span class="ui-icon ui-icon-alert"
                  style="float: left; margin-right: .3em;"></span>
            <strong>Alert:</strong><div id="info"></div>
        </p>
    </div>
</div>
<br>
<!--TODO Event delete-->
<div id='calendar'></div>
