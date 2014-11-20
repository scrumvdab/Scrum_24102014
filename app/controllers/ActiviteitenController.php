<?php

class ActiviteitenController extends BaseController {

    public function main() {
        return View::make('activiteiten');
    }

    /* poging Maarten om controller te maken voor activiteiten */

    public function __construct() {
        $this->beforeFilter('csrf', array('on' => 'post'));
        $this->beforeFilter('auth', array('only' => array('getDashboard')));
    }

    public function postCreate() {
        $validator = Validator::make(Input::all(), Activiteit::$rules);

        if ($validator->passes()) {
// validation has passed, save user in DB
            $activiteit = new Activiteit;
            $activiteit->title = Input::get('title');
            $activiteit->body = Input::get('body');
            $activiteit->begin = Input::get('begin');
            $activiteit->beginuur = Input::get('beginuur');
            $activiteit->einde = Input::get('einde');
            $activiteit->einduur = Input::get('einduur');
            $activiteit->image = Input::get('image');
            $activiteit->save();

            return Redirect::to('activiteiten')->with('message', 'U heeft succesvol een nieuwe activiteit aangemaakt');
        } else {
// validation has failed, display error messages
            return Redirect::to('activiteiten')->with('message', 'Oeps, er ging iets fout!')->withErrors($validator)->withInput();
        }
    }

    /* einde poging Maarten */
}
