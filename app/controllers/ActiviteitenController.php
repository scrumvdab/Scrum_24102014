<?php

class ActiviteitenController extends BaseController {

    public function main() {
        $activities = Activity::all();
        return View::make('activiteiten')->with('activities', $activities);
    }
    public function add() {
        return View::make('activiteiten_add');
    }

}
