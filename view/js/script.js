$(document).ready(function(){
    $('#passwordRepeat').keyup(function () {
        var password = $('#passwordRegister').val();
        var passwordRepeat = $(this).val();
        var color = 'red';
        if(password === passwordRepeat){
           color = 'green';
        }else{
            color = 'red';
        }
        $('#passwordRepeat').css("border-color",color);
    })



})