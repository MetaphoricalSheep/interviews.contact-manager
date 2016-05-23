<?php

require_once __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class_name) 
{
    if (DIRECTORY_SEPARATOR != '\\')
    {
        $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
    }
    
    $file = $class_name . '.php';
    
    if(file_exists($file)) 
    {
        require_once $file;
    }
});

require_once 'views/layout.php';
