@extends('templates.default')

@section('content')
<!--begin inhoud-->
<div class="container" id="content" style="min-height:700px">
    <div class="jumbotron">
        <h1 class="webfont">Nieuws op WVAVZW.BE</h1>
        <p>Groep 1 is de beste</p>
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/cave.jpg" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Hier komt dan de titel</h1>
                        <p>en een eventuele beschrijving van wat er nu te zien is</p>

                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/kids.jpg" alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>weer een andere titel</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>

                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/lightbulb.jpg" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>One more for good measure.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>                   
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 3000
        });
    });
</script>
<!--einde inhoud-->
@stop