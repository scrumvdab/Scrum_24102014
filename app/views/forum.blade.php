@extends('templates.default')

@section('content')


@if(@Session::has('success'))
<div class="container" id="content">
    <div class="alert alert-success">
        {{Session::get('success')}}

    </div>
    @elseif (@Session::has('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}

    </div>
    @endif
</div>

<!--{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }} doet in princiepe nie veel-->
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop

