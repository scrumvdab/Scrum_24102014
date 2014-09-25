@extends('templates.default')

@section('content')
<!--begin inhoud--> 
<div class="container" id="content">
    <div class="jumbotron" style="min-height:700px">
        <h2 class="webfont">Hieronder vind u het forum:</h2>
        <img src="images/page-under-construction.jpg">
    </div>
</div>
<!--einde inhoud-->
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop