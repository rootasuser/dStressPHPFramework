<?php

namespace App;

use dStress\Core\BaseController;

class MainController extends BaseController {
    public function home() {
        $this->render('home', ['title' => 'Welcome Home']);
    }
}
