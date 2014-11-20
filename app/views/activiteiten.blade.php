@extends('templates.default')
@section('content')
<!--begin inhoud-->





<div class="jumbotron container cf" id="content">
    <main>
        <div id="datepicker1">
            <main>
                <div id="left_content">

                    <!-- TEL nog derbij -->
                    <form class="form-horizontal" action="#" method="get">
                        <div class="form-group">
                            <h2>Hierin komen mijn activiteiten</h2>
                            {{ Form::open(array('url'=>'activiteiten/change', 'class'=>'form-signup')) }}
                            {{ Form::label('title', 'Naam: '); }}<br>
                            {{ Form::text('title', null, array('class'=>'input-block-level', 'placeholder'=>'Naam activiteit')) }}<br>
                            {{ Form::label('body', 'Beschrijving: '); }}<br>
                            {{ Form::textarea('body', null, array('style' => 'width: 100%')) }}<br>
                            {{ Form::label('begin', 'Begin: '); }}<br>
                            {{ Form::text('begin', null, array('class'=>'input-block-level', 'placeholder'=>'Begin activiteit', 'id' => 'begin')) }}<br>
                            {{ Form::label('beginuur', 'Beginuur: '); }}
                            {{ Form::selectRange('beginuur', 8+'u', 24+'u', array('class'=>'input-block-level', 'placeholder'=>'Beginuur activiteit')) }}<br>
                            {{ Form::label('einde', 'Einde: '); }}<br>
                            {{ Form::text('einde', null, array('class'=>'input-block-level', 'placeholder'=>'Einde activiteit', 'id' => 'einde')) }}<br>
                            {{ Form::label('einduur', 'Einduur: '); }}
                            {{ Form::selectRange('einduur', 8+'u', 24+'u', array('class'=>'input-block-level', 'placeholder'=>'Beginuur activiteit')) }}<br>
                            {{ Form::open(array('url'=>'apply/upload','method'=>'post', 'files'=>true)) }}
                            <div class="control-group">
                                <div class="controls">
                                    {{ Form::file('image') }}
                                    <p class="errors">{{$errors->first('image')}}</p>
                                    @if(Session::has('error'))
                                    <p class="errors">{{ Session::get('error') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div id="success"> </div>
                            {{ Form::submit('Bevestig input', array('class'=>'btn btn-primary'))}}
                        </div>

                    </form>
                </div>
            </main>


    </main>
    <main class="pull-left">
        <h1 class="hoofding">Hieronder vind u info over de activiteiten:</h1>
        <div id='wrap' class="cf">
            <div id='external-events' class="cf">
                <h4>Verplaatsbare evenementen</h4>
                <div class='fc-event'>Evenement 1</div>
                <div class='fc-event'>Evenement 2</div>
                <div class='fc-event'>Evenement 3</div>
                <div class='fc-event'>Evenement 4</div>
                <div class='fc-event'>Evenement 5</div>
                <p>
                    <input type='checkbox' id='drop-remove' />
                    <label for='drop-remove'>verwijder na verslepen</label>
                </p>
            </div>
            <div id='calendar'>
            </div>
        </div>
        @if(Auth::user())
        @if(Auth::user()->isAdmin())
    <iframe src="https://www.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=passchyn.maarten%40gmail.com&amp;color=%232952A3&amp;src=en.be%23holiday%40group.v.calendar.google.com&amp;color=%236B3304&amp;ctz=Europe%2FBrussels" style=" border-width:0 " width="100%" height="600px" frameborder="0" scrolling="no"></iframe></div>
@endif
@endif
</main>
</div>

<?php
$event1_title = "event1";
$event1_start = "2014-11-22T12:30:00";
$event1_end = "2014-11-22T16:30:00";
$event2_title = "event2";
$event2_start = "2014-11-26T12:30:00";
$event2_end = "2014-11-26T16:30:00";
?>


<script type="text/javascript">
    $(function() {
    $.datepicker.regional['nl'] = {clearText: 'Wissen', clearStatus: '',
            closeText: 'Sluiten', closeStatus: 'Onveranderd sluiten ',
            prevText: '<vorige', prevStatus: 'Zie de vorige maand',
            nextText: 'volgende>', nextStatus: 'Zie de volgende maand',
            currentText: 'Huidige', currentStatus: 'Bekijk de huidige maand',
            monthNames: ['Januari', 'Februari', 'Maart', 'April', 'Mei', 'Juni',
                    'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'],
            monthNamesShort: ['jan', 'feb', 'mrt', 'apr', 'mei', 'jun',
                    'jul', 'aug', 'sep', 'okt', 'nov', 'dec'],
            monthStatus: 'Bekijk een andere maand', yearStatus: 'Bekijk nog een jaar',
            weekHeader: 'Sm', weekStatus: '',
            dayNames: ['Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag'],
            dayNamesShort: ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'],
            dayNamesMin: ['Zo', 'Ma', 'Di', 'Wo', 'Do', 'Vr', 'Za'],
            dayStatus: 'Gebruik DD als de eerste dag van de week', dateStatus: 'Kies DD, MM d',
            dateFormat: 'yy/mm/dd', firstDay: 1,
            initStatus: 'Kies een datum', isRTL: false};
            $.datepicker.setDefaults($.datepicker.regional['nl']);
            $("#begin").datepicker({
    defaultDate: "+1w",
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            onClose: function(selectedDate) {
            $("#einde").datepicker("option", "minDate", selectedDate);
            }
    });
            $("#einde").datepicker({
    defaultDate: "+1w",
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            onClose: function(selectedDate) {
            $("#begin").datepicker("option", "maxDate", selectedDate);
            }
    });
    });</script>

<script type="text/javascript">
            $(document).ready(function() {
    /* initialize the external events
     -----------------------------------------------------------------*/
    var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            $('#external-events .fc-event').each(function() {

    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    // it doesn't need to have a start or end
    var eventObject = {
    title: $.trim($(this).text()) // use the element's text as the event title
    };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
    zIndex: 999,
            revert: true, // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
    });
    });
            /* initialize the calendar
             -----------------------------------------------------------------*/

            $('#calendar').fullCalendar({
    // events
    events:[
<?php echo "{ title: " . json_encode($event1_title) . ", start: " . json_encode($event1_start) . ", end: " . json_encode($event1_end) . " }," ?>
<?php echo "{ title: " . json_encode($event2_title) . ", start: " . json_encode($event2_start) . ", end: " . json_encode($event2_end) . " }," ?>

    {
    url: 'http://www.google.com/calendar/feeds/passchyn.maarten%40gmail.com/public/basic',
            className: 'gcal-event'}],
            // positie header (titel,knop vandaag,prev,next)
            header: {
            left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            eventColor: '#f00',
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(date) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);
                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
            // if so, remove the element from the "Draggable Events" list
            $(this).remove();
            }

            },
            eventClick: function(event, element) {

            event.title = "CLICKED!";
                    $('#calendar').fullCalendar('updateEvent', event);
            }
    });
    });
</script>

{{ HTML::style('bootstrap/css/jquery-ui.css') }}
{{ HTML::style('fullcalendar/fullcalendar.css') }}
{{ HTML::script('http://code.jquery.com/jquery-1.10.2.js') }}
{{ HTML::script('http://code.jquery.com/ui/1.11.1/jquery-ui.js') }}
{{ HTML::script('fullcalendar/lib/moment.min.js') }}
{{ HTML::script('fullcalendar/fullcalendar.js') }}
{{ HTML::script('lib/jquery.min.js') }}
{{ HTML::script('fullcalendar/gcal.js') }}

{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop