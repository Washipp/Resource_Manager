<h2>Login</h2>
<form method="post">
    <label for="emailLogin">Email: </label><input type="email" name="emailLogin" id="emailLogin">
    <label for="passwordLogin">Passwort: </label><input type="password" name="passwordLogin" id="passwordLogin">
    <input type="submit" name="login" id="login">
</form>
<hr />
<h2>Registrieren</h2>
<form method="post">
    <label for="name">Name:</label><input type="text" name="name" id="name">
    <label for="emailRegister">Email: </label><input type="email" name="emailRegister" id="emailRegister" required>
    <label for="passwordRegister">Passwort: </label><input type="password" name="passwordRegister" id="passwordRegister" required>
    <label for="passwordRepeat"> Passwort wiederholen: </label><input type="password" name="passwordRepeat" id="passwordRepeat" required>
    <input type="submit" name="register" id="register">
</form>