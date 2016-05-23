<?php

namespace controllers;

class Controller
{
    public function error_404()
    {
        require_once 'views/errors/404.php';
    }

    /**
     * Redirect to different page
     * @param string $uri
     */
    protected function redirect($uri)
    {
        header(sprintf("Location: %s", $uri));
        die();
    }
}
