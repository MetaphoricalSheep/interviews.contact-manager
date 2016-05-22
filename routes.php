<?php

function call($controller, $action)
{
    $controller = 'controllers\\' . ucfirst(strtolower($controller)) . 'Controller';
    
    if (!class_exists($controller))
    {
        $controller = new \controllers\Controller();
        $controller->error_404();

        return;
    }
    
    $controller = new $controller();
    
    // call the action
    if (!method_exists($controller, $action))
    {
        $controller->error_404();
        
        return;
    }
    
    $controller->{ $action }();
}

call($controller, $action);
