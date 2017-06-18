<?php
require_once 'model/User.php';

$user = new User();

$array = $user->showInformationById($_SESSION['userId']);


$name = $array['name'];
$email = $array['email'];
$created = $array['created'];


?>
<div class="row">
    <form method="post">
        Name: <?php echo $name; ?>  <button type="button" name="changeName" id="changeName" onclick="toggleNameChangeForm()">Change</button><br>
        Email: <?php echo $email; ?> <br>
        Password  <button type="button" name="changePassword" id="changePassword" onclick="togglePasswordChangeForm()">Change</button><br>
        <span style="font-size:75%">Created at <?php echo $created; ?></span>
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
        <input type="hidden" id="typePassword" name="typePassword" value="changePassword">
        <button type="button" id="register" onclick="sendInformationPassword()">Change</button>
    </form>
</div>

<div class="row" id="changeNameForm" style="display: none">
    <form method="post">
        <div class="twelve columns"
            <label for="passwordRegister">New Name: </label>
            <input class="u-full-width" type="text" name="newName" id="newName" required>
        </div>
        <input type="hidden" id="typeName" name="typeName" value="changeName">
        <button type="button" id="register" onclick="sendInformationName()">Change</button>
    </form>
</div>

<div class="info" id="info"></div>