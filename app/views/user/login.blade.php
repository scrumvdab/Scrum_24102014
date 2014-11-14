@extends('templates.default')
{{ HTML::style('bootstrap/css/jquery-ui.css') }}
@section('content')
<div class="container" id="content">
    <div class="jumbotron" id="login">
        {{ Form::open(array('url'=>'user/signin', 'class'=>'form-signin')) }}
        <h2 class="form-signin-heading">Aanmelden</h2>
        {{ Form::label('username', 'Gebruikersnaam: '); }}
        {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'Gebruikersnaam')) }}<br>
        {{ Form::label('password', 'Wachtwoord: '); }}
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Wachtwoord')) }}<br><br>    
        {{ Form::submit('Aanmelden', array('class'=>'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop