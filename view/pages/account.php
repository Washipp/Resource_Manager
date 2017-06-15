<?php
require_once 'model/User.php';

$user = new User();

$array = $user->showInformationById($_SESSION['userId']);

$name = $array['name'];
$email = $array['email'];
$created = $array['created'];

?>

<form method="post">
    Name: <?php echo $name; ?>  <button type="button" name="changeName" id="changeName" onclick="changeName()">Change</button><br>
    Email: <?php echo $email; ?> <br>
    Password  <button type="button" name="changePassword" id="changePassword" onclick="changePassword()">Change</button><br>
    Created at <?php echo $created; ?>
</form>