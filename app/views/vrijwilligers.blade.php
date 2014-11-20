@extends('templates.default')

@section('content')
<!--begin inhoud--> 
<div class="container" id="content">
    <main>
        <div class="jumbotron" style="min-height:700px">
            <h1 class="hoofding">Vrijwilligers</h1>
            </br>
            <p>Binnen de werking van de WVA vormen vrijwilligers een zeer belangrijke schakel.</p>
            <p>Zonder de inzet van vrijwilligers zijn wij als organisatie immers niet in staat om een dergelijke werking uit te bouwen.</p>
            <br/>
            <h2>Heb jij ook interesse om mee te werken als vrijwilliger?</h2>
            <br/>
            <article>
                <h3>Concreet zijn we op zoek naar:</h3>
                <ul>
                    <li> <p>monitoren voor speelpleinwerking Spelewijs </p></li>
                    <li> <p>vrijwilligers voor de 16-pluswerking tijdns de zomervkanantie</p></li>
                    <li> <p>vrijwilligers voor begeleiding van volwassenen met een beperking tijdens activiteiten van Het Atelier (in Ieper of Diksmuide)</p></li>
                    <li> <p>vrijwilligers om eten klaar te maken tijdens de zomer</p></li>
                    <li> <p>vrijwilligers om deelnemers thuis af te halen terug te brengen van en naar een activiteit</p></li>
                    <li> <p>vrijwlligers voor het openhouden van onze ontmoetingsruimte in Ieper en in Veurne</p></li>
                </ul>
            </article>
            <br/>
            <article>
                <h3>Wij bieden:</h3>
                <ul>
                    <li> <p>een vrijwilligersvergoeding</p></li>
                    <li> <p>vergoeding voor verplaatsingskosten</p></li>
                    <li> <p>een toffe sfeer om je als vrijiwlligers in te zetten</p></li>
                    <li> <p>betrokkenheid van vrijwilligers bij de werking</p></li>
                    <li> <p>dankbaarheid voor je inzet</p></li>
                    <li> <p>vormingsmogelijkheden</p></li>
                    <li> <p>ondersteuning van een beroepskracht</p></li>
                    <li> <p>als vrijwilliger ben je verzekerd</p></li>
                    <li> <p>vrijwilligersactiviteiten</p></li>
                </ul>
            </article>
            <br/>
            <article>
                <p><i>Heb je interesse?</i></p>
                <p>Neem dan contact op met de WVA op het nummer 057 21 55 35 of via <a href="mailto:wva@telenet.be" class="navGroen">wva@telenet.be</a>.</p>
                <p>Hier kan je ook terecht voor meer informatie.</p>
                    <br/>
            </article>
            Voor de huidige vrijwilligerscampagne, krijgt de WVA onderteuning van de <a href="http://www.wtv.be/" class="navGroen" target="new">regionale televisie WTV.</a>
            <br/>
            <figure id="logo_wtv">
                <a href="http://www.wtv.be/" target="new"> <img src="images/logo_WTV.png" alt="logo_wtv"/> </a>
            </figure>
            <iframe class="video" width="420" height="315" src="//www.youtube.com/embed/AstH9OK3LkE" frameborder="0" allowfullscreen></iframe>
            <iframe class="video" width="420" height="315" src="//www.youtube.com/embed/Wspa8NS9wiA" frameborder="0" allowfullscreen></iframe>
            <br/>
            <br/>
            <p>De Werkgroep Vorming en Aktie is erkend als vrijetijdsorganisatie.</p>
            <p>De vrijwilligers vormen een onmisbaar deel van de werking van de WVA. Zonder de enthousisate medewerking van heel wat vrijwilligers is het immers ondenkbaar om onze werking draaiende te houden.</p>

            <p>Dat onze vrijwilligers onmisbaar zijn weten we maar al te goed.</p>
            <p>Voor heel wat zaken doen we een beroep op de medewerking van vrijwilligers. Enkele voorbeelden: voor vervoer, om te helpen bij de begeleiding van deelnemers aan activiteiten van de verschillende deelwerkingen, voor het openhouden van onze ontmoetingsruimten (De Spiegel in Ieper en de TGV in Veurne), hepen bij koken en busbegeleiding tijdens de zomervakantie en noem maar op.</p>

            <p>Als vrijwilligersorganisatie zorgen we dan ook voor een goed onthaal van nieuwe vrijwilligers. Naast het onthaal van nieuwe vrijwilligers zorgen we ervoor dat de vrijwilligers sterk betrokken worden bij de werking van de WVA. Inspraak is altijd al heel belangrijk geweest. Vrijwilligers maken dan ook reeds lang deel uit van het bestuur van de verschillende deelwerkingen van de WVA.</p>

            <p>Wij organiseren op geregelde tijdstippen ook vorming voor de vrijwillige medewerkers.</p>
            <p>Interesse om als vrijwilliger mee te werken? Neem dan alvast contact met ons op! Telefoon 057/21 55 35 of mail naar <a href="mailto:wva@telenet.be" class="navGroen">wva@telenet.be</a>. Tijdens een persoonlijk gesprek krijg je heel wat meer info over de werking en wat vrijwilligerswerk zo allemaal inhoudt.</p>
        </div>
    </main>
</div>
<!--einde inhoud-->
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop