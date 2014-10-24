@extends('templates.default')

@section('content')
<!--begin inhoud -->

<div id="content" class="contact container">
    <div id="Map">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
                src="https://maps.google.be/maps?sll=50.8476874,2.8880892&amp;sspn=0.0052025,0.0109864&amp;q=Rijselstraat+98,+8900+Ieper&amp;ie=UTF8&amp;hq=&amp;hnear=Rijselstraat+98,+8900+Ieper&amp;t=m&amp;z=14&amp;ll=50.847687,2.888089&amp;output=embed">

        </iframe>
        <small>
            <a href="https://maps.google.be/maps?sll=50.8476874,2.8880892&amp;sspn=0.0052025,0.0109864&amp;q=Rijselstraat+98,+8900+Ieper&amp;ie=UTF8&amp;hq=&amp;hnear=Rijselstraat+98,+8900+Ieper&amp;t=m&amp;z=14&amp;ll=50.847687,2.888089&amp;source=embed" style="color:#000000;text-align:left" target="new">Bekijk de map in het groot</a>
        </small>
    </div>

    <div id="right_content">

        <!-- TEL nog derbij -->
        <form class="form-horizontal" action="#" method="get">
            <div class="form-group">
                <label for="email" class="control-label">Email</label>

                <input type="email" name="email" class="form-control" id="email" placeholder="Emailadres" required="required">

            </div>
            <div class="form-group">
                <label for="subject" class="control-label">Onderwerp</label>

                <input type="text" name="subject" class="form-control" id="subject" placeholder="Onderwerp" required="required">

            </div>

            <div class="form-group">
                <label for="message" class="control-label">Boodschap</label>

                <textarea id="message" class="form-control" name="message"></textarea>

            </div>

            <div class="form-group col-md-12 button">
                <button type="submit" class="btn btn-primary" name="verzend">verzend</button><br>
                <?php
                if (isset($_GET["email"])) {

                    echo "<h2>Uw invoer :</h2>";
                    print("Email: " . $email);
                    echo "<br>";
                    print("Onderwerp: " . $subject);
                    echo "<br>";
                    print("Boodschap: " . $message);
                    echo "<br>";
                }
                ?>        
            </div>
        </form>
    </div>
</div>
<!--einde inhoud-->
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop