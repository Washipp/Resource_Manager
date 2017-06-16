<?php
require_once 'model/User.php';
/*
$user = new User();

$array = $user->showInformationById($_SESSION['userId']);
*/
$array = [
    "name" => "Silas",
    "email" => "silas.meier“bluewsdf",
    "created" => "today"
];

$name = $array['name'];
$email = $array['email'];
$created = $array['created'];


?>
<div class="row">
    <form method="post">
        Name: <?php echo $name; ?>  <button type="button" name="changeName" id="changeName" onclick="showNameChangeForm()">Change</button><br>
        Email: <?php echo $email; ?> <br>
        Password  <button type="button" name="changePassword" id="changePassword" onclick="showPasswordChangeForm()">Change</button><br>
        Created at <?php echo $created; ?>
    </form>
</div>
<div class="row" id="changePasswordForm" style="display: none">
    <form method="post">
        <div class="six columns">
            <label for="passwordRegister">Password: </label>
            <input class="u-full-width" type="password" name="passwordRegister" id="passwordRegister" required>
        </div>
        <div class="six columns">
            <label for="passwordRepeat"> Repeat Password: </label>
            <input class="u-full-width" type="password" name="passwordRepeat" id="passwordRepeat" required>
        </div>
        <input type="hidden" id="type" name="type" value="changePassword">
        <button type="button" id="register" onclick="sendInformation()">Register</button>
    </form>
</div>
<div class="info" id="info"></div>