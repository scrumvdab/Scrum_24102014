@extends('templates.default')
@section('content')
<!--begin inhoud-->


<div class="jumbotron container cf" id="content">
    <div id="datepicker1" class="form-group">
        <h2>Activiteiten toevoegen</h2>
        {{ Form::open(array('url'=>'activiteiten/change', 'class'=>'form-signup')) }}
        {{ Form::label('title', 'Naam: '); }}<br>
        {{ Form::text('title', null, array('class'=>'input-block-level', 'placeholder'=>'Naam activiteit')) }}<br>
        {{ Form::label('body', 'Beschrijving: '); }}<br>
        {{ Form::textarea('body', null, array('style' => 'width: 100%')) }}<br>
        {{ Form::label('begin', 'Begin: '); }}<br>
        {{ Form::text('begin', null, array('class'=>'input-block-level', 'placeholder'=>'Begin activiteit', 'id' => 'begin')) }}<br>
        {{ Form::label('beginuur', 'Beginuur: '); }}
        {{ Form::text('beginuur', null, array('class'=>'input-block-level', 'placeholder'=>'Beginuur activiteit')) }}<br>
        {{ Form::label('einde', 'Einde: '); }}<br>
        {{ Form::text('einde', null, array('class'=>'input-block-level', 'placeholder'=>'Einde activiteit', 'id' => 'einde')) }}<br>
        {{ Form::label('einduur', 'Einduur: '); }}
        {{ Form::text('einduur', null, array('class'=>'input-block-level', 'placeholder'=>'Beginuur activiteit')) }}<br>
        {{ Form::close() }}
        {{ Form::open(array('url'=>'test','method'=>'post', 'files'=>true)) }}
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
        {{ Form::close() }}
    </div>
</div>

<script type="text/javascript">
    $(function () {
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
            dateFormat: 'dd/mm/yy', firstDay: 1,
            initStatus: 'Kies een datum', isRTL: false};
        $.datepicker.setDefaults($.datepicker.regional['nl']);
        $("#from").datepicker({
            defaultDate: "+1w",
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            onClose: function (selectedDate) {
                $("#to").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#to").datepicker({
            defaultDate: "+1w",
            showOtherMonths: true,
            selectOtherMonths: true,
            showButtonPanel: true,
            onClose: function (selectedDate) {
                $("#from").datepicker("option", "maxDate", selectedDate);
            }
        });
    });
</script>

{{ HTML::style('bootstrap/css/jquery-ui.css') }}
{{ HTML::style('fullcalendar/fullcalendar.css') }}
{{ HTML::script('http://code.jquery.com/jquery-1.10.2.js') }}
{{ HTML::script('http://code.jquery.com/ui/1.11.1/jquery-ui.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}

@stop