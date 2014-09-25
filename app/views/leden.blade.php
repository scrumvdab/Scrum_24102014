@extends('templates.default')

@section('content')
<!--begin inhoud--> 
<div class="container" id="content">
    <div class="jumbotron">
        <h4 class="webfont">Via het ledenformulier krijgt u toegang tot de nieuwbrieven:</h4>
        <section id="Formulier">
            <form class="form-horizontal col-md-4 col-xs-4">
                <div class="form-group">
                    <label for="inputVoornaam" class="control-label col-md-4 col-xs-4">Voornaam</label>
                    <input type="text" class="form-control col-md-6  col-xs-4" id="inputVoornaam" name="Voornaam" placeholder="Voornaam" required="required">
                </div>
                <div class="form-group">
                    <label for="inputFamilienaam" class="control-label col-md-4 col-xs-4">Familienaam</label>
                    <input type="text" class="form-control col-md-6  col-xs-4" id="inputFamilienaam" name="Familienaam" placeholder="Familienaam" required="required">
                </div>
                <div class="form-group">
                    <label for="inputAdres" class="control-label col-md-4 col-xs-4">Adres</label>
                    <input type="text" class="form-control col-md-6  col-xs-4" id="inputAdres" name="Adres" placeholder="Adres" required="required">
                </div>
                <div class="form-group">
                    <label for="inputGemeente" class="control-label col-md-4 col-xs-4">Gemeente</label>
                    <input type="text" class="form-control col-md-6  col-xs-4" id="inputGemeente" name="Gemeente" placeholder="Gemeente" required="required">
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="control-label col-md-4 col-xs-4">Email</label>
                    <input type="email" class="form-control col-md-6  col-xs-4" id="inputEmail" name="Email" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                    <label for="inputTelefoon" class="control-label col-md-4 col-xs-4">Telefoon</label>
                    <input type="text" class="form-control col-md-6  col-xs-4" id="inputTelefoon" name="Telefoonnummer" placeholder="Telefoonnummer" required="required">
                </div>
                <div class="form-group">
                    <label for="inputBoodschap" class="control-label col-md-4 col-xs-4">Boodschap</label>
                    <textarea id="feedback" class="form-control col-md-6  col-xs-4" name="Boodschap"></textarea>
                </div>
                <div class="inline">
                    <label class="labelCheckbox">
                        <input type="checkbox" id="actiesmail" name="Check" value="1" />
                        ik wens de nieuwsbrief te ontvangen
                    </label>
                </div>
                <div class="form-group col-md-10">
                    <div class="col-xs-10">
                        <div class="checkbox">
                            <label><input type="checkbox" name="Check"  value="2"> ik wens per <b>email</b> op de hoogte gehouden te worden</label><br>
                            <label><input type="checkbox" name="Check" value="3"> ik wens per <b>post</b> op de hoogte gehouden te worden</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-xs-offset-2 col-xs-10">
                        <button type="submit" class="btn btn-primary">Login</button><br>
                    </div>
                </div>               
            </form>
        </section>
    </div>
</div>
<!--einde inhoud-->
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}
@stop