/**
 * Created by Silas on 15.06.2017.
 */

function changeName(){
    var email = $('#emailLogin').val();
    var password = $('#passwordLogin').val();
    if(email === ''){}
    else{
        $.ajax({
            url     : 'controller/account.controller.php',
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
                $('#info').text('Login failed. Please try again.');
            }
        });
    }
}

function changePassword(){
    $(".content").append(
        '<div> <form><label for="passwordRegister">Password: </label><input type="password" name="passwordRegister" id="passwordRegister" required>'+
        '<label for="passwordRepeat"> Repeat Password: </label><input type="password" name="passwordRepeat" id="passwordRepeat" required>'+
        '<input type="hidden" id="type" name="type" value="changePassword"> '+
        '<button type="button" id="register" onclick="sendInformation()">Register</button></form></div>'
    );
}

function sendInformation(){
    var type = $('#type').val();
    var name = $('#name').val();
    var email = $('#emailRegister').val();
    var password = $('#passwordRegister').val();
    var passwordRepeat = $('#passwordRepeat').val();

    $.ajax({
        url     : 'controller/account.controller.php',
        method  : 'post',
        data    : {
            'type' : type,
            'name': name,
            'email' : email,
            'password' : password,
            'passwordRepeat' : passwordRepeat
        },
        success : function( response ) {
            $('#info').text(response);
        },
        error : function ( xhr, ajaxOptions, thrownError ) {
            $('#info').text('An error occurred while trying to register. Please try again.');
        }
    });
}
