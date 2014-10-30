@extends('layouts.master')

@section('head')
	@parent
	<title>Nieuwe Thread</title>
@stop

@section('content')
	<h1>Nieuwe thread</h1>

	<form action="{{ URL::route('forum-store-thread', $id) }}" method="post">
		<div class="form-group">
			<label for="title">Titel: </label>
			<input type="text" class="form-control" name="title" id="title">
		</div>

		<div class="form-group">
			<label for="body">Boodschap: </label>
			<textarea class="form-control" name="body" id="body"></textarea>
		</div>
		{{ Form::token() }}
		<div class="form-group">
			<input type="submit" value="Bewaar Thread" class="btn btn-primary">
		</div>
	</form>
@stop