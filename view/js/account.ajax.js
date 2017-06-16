/**
 * Created by Silas on 15.06.2017.
 */

function showNameChangeForm(){
    $(".content").append(
        '<div> <form><label for="passwordRegister">New Name: </label><input type="text" name="newName" id="newName" required>'+
        '<input type="hidden" id="type" name="type" value="changeName"> '+
        '<button type="button" id="register" onclick="sendInformation()">Register</button></form></div>'
    );
}

function showPasswordChangeForm(){
    //TODO: change to hidden
    $("#changePasswordForm").toggle();
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
