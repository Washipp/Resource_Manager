/**
 * Created by Silas on 15.06.2017.
 */

function toggleNameChangeForm(){
    $("#changeNameForm").toggle();
}

function togglePasswordChangeForm(){
    $("#changePasswordForm").toggle();
}

function sendInformationPassword(){
    var type = $('#typePassword').val();
    var password = $('#passwordRegister').val();
    var passwordRepeat = $('#passwordRepeat').val();

    $.ajax({
        url     : 'controller/account.controller.php',
        method  : 'post',
        data    : {
            'type' : type,
            'password' : password,
            'passwordRepeat' : passwordRepeat
        },
        success : function( response ) {
            $('#infoBox').show();
            $('#infoBox').addClass('ui-state-highlight');
            $('#info').append(response);
        },
        error : function ( xhr, ajaxOptions, thrownError ) {
            $('#infoBox').show();
            $('#infoBox').addClass('ui-state-error');
            $('#info').append('An error occurred while trying to change the password. Please try again.');
        }
    });
}

function sendInformationName(){
    var type = $('#typeName').val();
    var name = $('#newName').val();

    $.ajax({
        url     : 'controller/account.controller.php',
        method  : 'post',
        data    : {
            'type' : type,
            'name' : name
        },
        success : function( response ) {
            $('#infoBox').show();
            $('#infoBox').addClass('ui-state-highlight');
            $('#info').append(response);
        },
        error : function ( xhr, ajaxOptions, thrownError ) {
            $('#infoBox').show();
            $('#infoBox').addClass('ui-state-error');
            $('#info').append('An error occurred while trying to change the name. Please try again.');
        }
    });
}
