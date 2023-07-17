<?php

namespace App\Controllers;

class AboutController extends Controller{
   
    public function index() {
        $this->renderView('a-propos');
    }

}