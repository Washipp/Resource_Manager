/**
 * Created by Silas on 21.06.2017.
 */
$(document).ready(function() {

    $('#external-events .fc-event').each(function() {

        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            id: $.trim($(this).attr('id')),
            stick: true // maintain when user navigates (see docs on the renderEvent method)
        });

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });


    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: '2017-06-27',
        defaultView: 'agendaDay',
        editable: true,
        droppable: true,
        events: {
            url: 'controller/reservation.controller.php',
            type: 'POST',
            data: {
                'type' : 'getReservations'
            },
            error: function() {
                alert('there was an error while fetching events!');
            }
        },
        eventResize: function(event, delta, revertFunc) {
            updateEvent(event.id, event.start.toISOString(), event.end.toISOString(), revertFunc);
        },
        eventDrop: function(event, delta, revertFunc) {
            updateEvent(event.id, event.start.toISOString(), event.end.toISOString(), revertFunc);
        },
        eventClick: function (event) {
            alert(event.id);
        },
        eventReceive : function(event) {
            var endDate = new Date(event.start.toISOString());
            endDate.setHours(endDate.getHours()+2);
            addNewReservation(event.id, event.start.toISOString(), endDate.toISOString());
            /*alert(event.start.toISOString());
            var date = new Date(event.start.toISOString());
            date.setHours(date.getHours()+2);
            alert(date.toISOString());*/
        }

    });



});

function updateEvent(id, start, end, revertFunc){
    $.ajax({
        url     : 'controller/reservation.controller.php',
        method  : 'post',
        data    : {
            'type' : 'updateReservation',
            'id_reso' : id,
            'start_date' : start,
            'end_date' : end
        },
        success : function( result ){

        },
        error: function( error ){
            alert(error);
            revertFunc();
        }
    });
}

function addNewReservation(id, start, end){
    $.ajax({
        url     : 'controller/reservation.controller.php',
        method  : 'post',
        data    : {
            'type' : 'addNewReservation',
            'id_reso' : id,
            'start_date' : start,
            'end_date' : end
        },
        success : function( result ){
            alert(result);
        },
        error: function( error ){
            alert(error);
        }
    });
}