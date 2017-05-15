<hr>
<a href="home">Home</a>
<?php
//if(isset($_SESSION['userid'])){
    echo'
         <a href="account">Account</a>
         <a href="resources">Ressourcen</a>
         <a href="addresource">Ressource Hinzuf&uuml;gen</a>
		';
//}else{
    echo '<a href="login">Login</a>';
//}
?>
<hr>