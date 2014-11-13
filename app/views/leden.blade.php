@extends('templates.default')

@section('content')
<!--begin inhoud--> 
<div class="container" id="content">
    <main>
        <div class="jumbotron">
            <h4 class="webfont">Via het ledenformulier krijgt u toegang tot de nieuwbrieven:</h4>
            <div id="Formulier" class="col-md-6 col-xs-4">
                <form class="form-horizontal col-md-4 col-xs-4" id="form_nieuwsbrief" action="verzend.php" method="post">

                    <div class="inline">
                        <label class="labelCheckbox">
                            <input type="checkbox" id="actiemail" name="Check" value="1" />
                            ik wens de nieuwsbrief te ontvangen
                        </label>
                    </div>
                    <div class="checkbox">
                        <label class="KorteZin"><input type="checkbox" name="Check"  value="2">per <b>email</b></label><br>
                        <label class="LangeZin"><input type="checkbox" name="Check"  value="2"> ik wens per <b>email</b> op de hoogte gehouden te worden</label><br>
                    </div>
                    <div class="form-group verberg nieuwsbrief">
                        <label for="Email" class="control-label col-md-4 col-xs-4">Email</label>
                        <input type="email" class="form-control col-md-6  col-xs-4" id="Email" name="Email" placeholder="Email" required="required">
                    </div>
                    <div class="checkbox">    
                        <label class="KorteZin"><input type="checkbox" name="Check" value="3">per <b>post</b></label>
                        <label class="LangeZin"><input type="checkbox" name="Check" value="3"> ik wens per <b>post</b> op de hoogte gehouden te worden</label>                          
                    </div>
                    <div class="nieuwsbrief form-group verberg">
                        <label for="Adres" class="control-label col-md-4 col-xs-4">Verzend adres</label>
                        <input type="text" class="form-control col-md-6  col-xs-4" id="inputAdres" name="Adres" placeholder="Adres" required="required">
                    </div>
                    <div class="nieuwsbrief form-group verberg">
                        <label for="Gemeente" class="control-label col-md-4 col-xs-4">Gemeente</label>
                        <input type="text" class="form-control col-md-6  col-xs-4" id="inputGemeente" name="Gemeente" placeholder="Gemeente" required="required">
                    </div>
                    <div class="nieuwsbrief form-group verberg">
                        <label for="RekNr" class="control-label col-md-4 col-xs-4">Rek. NR.</label>
                        <input type="text" class="form-control col-md-6  col-xs-4" id="inputRekNr" name="REKNR" placeholder="BE2213544567881" required="required">
                    </div>
                    <div class="nieuwsbrief form-group col-md-12 ">
                        <div class="col-xs-offset-2 col-xs-10">
                            <button type="submit" id="bestel" name="bestel" class="btn btn-primary">Bestel</button><br>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </main>
</div>
<!--einde inhoud-->
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js') }}
{{ HTML::script('bootstrap/js/bootstrap.min.js') }}


@stop