/**
 * Created by Silas on 21.06.2017.
 */
$(document).ready(function() {

    $('#external-events .fc-event').each(function() {
        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            id: $.trim($(this).attr('id')),
            stick: false // maintain when user navigates (see docs on the renderEvent method)
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
            right: 'agendaWeek,agendaDay,listDay'
        },
        defaultDate: getCurrentDate(),
        defaultView: 'agendaDay',
        editable: true,
        droppable: true,
        events: {
            url: 'controller/reservation.controller.php',
            type: 'POST',
            data: {
                'type' : 'getReservations'
            },
            error: function( error) {
                $('#infoBox').show().addClass('ui-state-error');
                $('#info').text('An unknown Error occurred, please try again.');
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
            $('#calendar').fullCalendar('updateEvent', event);
        },
        eventAfterRender: function(event, element) {
            if(event.name !== undefined) {
                element.find('.fc-title').append("<span style='float:right'>" + event.name + "</span>" +
                    "<br/>" + event.description +
                    "<br/><span style='float:right' class='glyphicon glyphicon-trash' onclick='deleteReservation("+event.id+")'></span>");
            }
        }

    });

});

function updateEvent(id, start, end, revertFunc){
    $.ajax({
        url     : 'controller/reservation.controller.php',
        method  : 'post',
        data    : {
            'type' : 'updateReservation',
            'id_rese' : id,
            'start_date' : start,
            'end_date' : end
        },
        success : function( result ){
            $('#infoBox').show().addClass('ui-state-highlight');
            $('#info').text(result);
        },
        error: function( error ){
            $('#infoBox').show().addClass('ui-state-error');
            $('#info').text(error);
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
            $('#infoBox').show().addClass('ui-state-highlight');
            $('#info').text(result);
        },
        error: function( error ){
            $('#infoBox').show();
            $('#infoBox').show().addClass('ui-state-error');
            $('#info').text(error);
        }
    });
}

function deleteReservation(id){
    $('#calendar').fullCalendar('removeEvents', id);
    $.ajax({
        url     : 'controller/reservation.controller.php',
        method  : 'post',
        data    : {
            'type' : 'deleteReservation',
            'id_rese' : id
        },
        success : function( result ){
            $('#infoBox').show().addClass('ui-state-highlight');
            $('#info').text(result);
        },
        error: function( error ){
            $('#infoBox').show().addClass('ui-state-error');
            $('#info').text(error);
        }
    });
}

function getCurrentDate(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    }

    if(mm<10) {
        mm = '0'+mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    return today;
}