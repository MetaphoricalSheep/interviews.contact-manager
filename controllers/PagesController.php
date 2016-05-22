<?php

namespace controllers;

class PagesController extends Controller
{
    public function home() 
    {
        $first_name = 'Jon';
        $last_name  = 'Snow';
        require_once 'views/pages/home.php';
    }
}
