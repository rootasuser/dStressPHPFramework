<?php

namespace dStress\Core;

class BaseController {
    protected function render($view, $data = []) {
        extract($data);
        include __DIR__ . "/../Views/$view.php";
    }
}
