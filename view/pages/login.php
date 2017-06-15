
<h2>Login</h2>
<form method="post">
    <label for="emailLogin">Email: </label><input type="email" name="emailLogin" id="emailLogin">
    <label for="passwordLogin">Password: </label><input type="password" name="passwordLogin" id="passwordLogin">
    <button type="button" name="login" id="login" onclick="sendLoginInputs()">Login</button>
</form>
<hr />
<h2>Register</h2>
<form method="post">
    <label for="name">Name:</label><input type="text" name="name" id="name">
    <label for="emailRegister">Email: </label><input type="email" name="emailRegister" id="emailRegister" required>
    <label for="passwordRegister">Password: </label><input type="password" name="passwordRegister" id="passwordRegister" required>
    <label for="passwordRepeat"> Repeat Password: </label><input type="password" name="passwordRepeat" id="passwordRepeat" required>
    <button type="button" id="register" onclick="sendRegisterInputs()">Register</button>
</form>
<div class="info" id="info"></div>