@extends('templates.default')

@section('content')
<!--begin inhoud--> 
<div class="container" id="content">
    <main>
        <div class="jumbotron" style="min-height:700px">
            <h1 class="webfont">Steun de WVA en ontvang een fiscaal attest</h1>
            <p>We zijn op zoek naar bijkomende financiële middelen.
                Voor giften vanaf 40 euro, kunnen wij een fiscaal attest geven.

                De giften zullen gebruikt worden voor de verdere uitbouw van onze werking.

                Giften kunnen gestort worden op het rekeningnummer BE03 4648 2101 1184,
                van de Werkgroep Vorming en Aktie, Rijselstraat 98, 8900 Ieper.

                Alvast van harte bedankt voor uw steun!</p>
        </div>
    </main>
</div>
<!--einde inhoud-->
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop