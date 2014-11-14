@extends('templates.default')
{{ HTML::style('bootstrap/css/jquery-ui.css') }}
@section('content')
<div class="container" id="content">
    <div class="jumbotron">
        <h1>Persoonlijk Profiel</h1>
        <h3>Welkom {{ $username = Auth::user()->username; }}</h3><br>
        <h2>Gegevens</h2>
        <div id="Gegevens">
            <p>Naam: {{ $firstname = Auth::user()->firstname; }} {{ $lastname = Auth::user()->lastname; }}</p>
            <p>Adres: {{ $adress = Auth::user()->adress; }} {{ $zip = Auth::user()->zip; }} {{ $city = Auth::user()->city; }}</p>
            <p>E-mail: {{ $email = Auth::user()->email; }}</p>
            <p>Telefoonnr: {{ $phone = Auth::user()->phone; }}</p>
            <p>Rekeningnr: {{ $banknr = Auth::user()->banknr; }}</p>
            {{ Form::open(array('url'=>'user/update','method'=>'get')) }}
            {{ Form::submit('Gegevens Aanpassen', array('class'=>'send-btn')) }}
            {{ Form::close() }}
        </div>
        <div style="float:right; margin-top:-330px" id="Avatar">
            <h2>Avatar</h2>
            <div class="text-content">
                <div class="span7 offset1">
                    @if(Session::has('success'))
                    <div class="alert-box success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
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
                    {{ Form::submit('Verzenden', array('class'=>'send-btn')) }}
                    {{ Form::close() }}
                </div> 
                <img style="float:right;" src="../uploads/{{ $id = Auth::user()->id }}.jpg" alt="avatar"/>
            </div>
        </div>
        <h2>Nieuwsbrief</h2>
        <div id="Nieuwsbrief">
            {{ Form::open(array('method' => 'post')) }}
            {{ Form::label('nieuwsbrief', 'Hoe wilt u uw nieuwsbrief ontvangen?') }}
            {{ Form::radio('nieuwsbrief', 'news', true) }} E-mail
            {{ Form::radio('nieuwsbrief', 'news_extra') }} Post
            {{ Form::close() }}
        </div>
    </div>
</div>
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop