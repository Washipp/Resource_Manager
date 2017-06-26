/**
 * Created by Silas on 21.06.2017.
 */
$(document).ready(function() {
   /* $('#calendar').fullCalendar({
        events: 'controller/reservation.controller.php'
    });*/
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: '2017-06-12',
        defaultView: 'agendaDay',
        editable: true,
        events: 'controller/reservation.controller.php'

    });
    //$('#calendar').fullCalendar('changeView', 'agendaDay');
});

function loadAllEvents(){
    $.ajax({
        url     : 'controller/reservation.controller.php',
        method  : 'post',
        data    : {
            'type' : 'getReservations'
        },
        success : function( result ){
            $('#test').append(result);
    }});
}