
<h2>Login</h2>
<div class="row">
    <form method="post">
        <div class="six columns">
            <label for="emailLogin">Email: </label>
            <input class="u-full-width" type="email" name="emailLogin" id="emailLogin" placeholder="test@mail.com" required>
        </div>
        <div class="six columns">
            <label for="passwordLogin">Password: </label>
            <input class="u-full-width" type="password" name="passwordLogin" id="passwordLogin" placeholder="Password" required>
        </div>
        <button type="button" name="login" id="login" onclick="sendLoginInputs()">Login</button>
    </form>
</div>
<!--TODO add info div for Login-->
<hr />
<h2>Register</h2>
<div class="row">
    <form method="post">
        <div class="three columns">
            <label for="name">Name:</label>
            <input class="u-full-width" type="text" name="name" id="name" placeholder="John Doe">
        </div>
        <div class="three columns">
            <label for="emailRegister">Email: </label>
            <input class="u-full-width" type="email" name="emailRegister" id="emailRegister" placeholder="test@mail.com" required>
        </div>
        <div class="three columns">
            <label for="passwordRegister">Password: </label>
            <input class="u-full-width" type="password" name="passwordRegister" id="passwordRegister" placeholder="Password" required>
        </div>
        <div class="three columns">
            <label for="passwordRepeat"> Repeat Password: </label>
            <input class="u-full-width" type="password" name="passwordRepeat" id="passwordRepeat" placeholder="Password Repeat" required>
        </div>
        <button type="button" id="register" onclick="sendRegisterInputs()">Register</button>
    </form>
</div>
<div class="info" id="info"></div>