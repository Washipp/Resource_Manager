/**
 * Created by Silas on 15.06.2017.
 */

function sendResourceInputs(){
    var title = $('#title').val();
    var description = $('#description').val();

    $.ajax({
        url     : 'controller/resource.controller.php',
        method  : 'post',
        data    : {
            'title': title,
            'description' : description,
        },
        success : function( response ) {
            $('#title').val('');
            $('#description').val('');
            $('#info').text(response);
        },
        error : function ( xhr, ajaxOptions, thrownError ) {
            $('#info').text('An error occurred while adding a new resource, please try again.');
            alert(thrownError);
        }
    });
}