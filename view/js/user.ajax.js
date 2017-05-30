/**
 * Created by Silas on 15.05.2017.
 */

function sendLoginInputs(){
    var email = $('#emailLogin').val();
    var password = $('#passwordLogin').val();
    if(email === ''){}
    else{
        $.ajax({
            url     : 'controller/user.controller.php',
            method  : 'post',
            data    : {
                'type' : 'login',
                'email' : email,
                'password' : password
            },
            success : function( response ) {
                $('#info').text(response);
            },
            error : function () {
                $('#info').text('Login ist fehlgeschlagen.');
            }
        });
    }
}

function sendRegisterInputs(){
    var name = $('#name').val();
    var email = $('#emailRegister').val();
    var password = $('#passwordRegister').val();
    var passwordRepeat = $('#passwordRepeat').val();

    $.ajax({
        url     : 'controller/user.controller.php',
        method  : 'post',
        data    : {
            'type' : 'register',
            'name': name,
            'email' : email,
            'password' : password,
            'passwordRepeat' : passwordRepeat
        },
        success : function( response ) {
            $('#info').text(response);
        },
        error : function ( xhr, ajaxOptions, thrownError ) {
            $('#info').text('Registrieren hat nicht funktioniert. Bitte erneut probieren.');
            alert(thrownError);
        }
    });
}
