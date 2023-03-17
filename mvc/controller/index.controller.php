<?php

class Indexcontroller extends Controller {

    static public function index(){
        require_once view('home', []);
    }
}