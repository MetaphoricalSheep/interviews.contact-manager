<?php

namespace controllers;

class Controller
{
    public function error_404()
    {
        require_once 'views/errors/404.php';
    }
}
