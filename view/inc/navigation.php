<hr>
<a href="home">Home</a>
<a href="account">Account</a>
<a href="resources">Ressourcen</a>
<a href="addresource">Add Ressource</a>
<?php
if(isset($_SESSION['userId'])){
    echo'
         <a href="logout">Logout</a>
		';
}else{
    echo '<a href="login">Login</a>';
}
?>
<hr>