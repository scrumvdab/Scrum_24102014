@extends('templates.default')
{{ HTML::style('bootstrap/css/jquery-ui.css') }}
@section('content')
<div class="container" id="content">
    <div class="jumbotron">
        {{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
        <h2 class="form-signup-heading">Registreren</h2>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        {{ Form::text('firstname', null, array('class'=>'input-block-level', 'placeholder'=>'Voornaam')) }}<br>
        {{ Form::text('lastname', null, array('class'=>'input-block-level', 'placeholder'=>'Naam')) }}<br>
        {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'username')) }}<br>
        {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'E-mail')) }}<br>
        {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Wachtwoord ')) }}<br>
        {{ Form::password('password_confirmation', array('class'=>'input-block-level', 'placeholder'=>'Wachtwoord bevestigen')) }}<br>
        {{ Form::text('phone', null, array('class'=>'input-block-level', 'placeholder'=> 'Telefoonnummer')) }}<br>
        {{ Form::textarea('message', null, array('class'=>'input-block-level', 'placeholder'=> 'Iets extra toe te voegen?')) }}<br><br>


        {{ Form::submit('Registreren', array('class'=>'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop