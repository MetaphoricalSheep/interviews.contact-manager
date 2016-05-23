<?php

$router = new \Klein\Klein();

$contactsController = new \controllers\ContactsController();

$router->respond('/', function ($request, $response)
{
    $response->redirect('/contacts', 302);
});

$router->with('/contacts', function () use ($router, $contactsController) 
{
    $router->respond('GET', '/?', function($request) use ($contactsController)
    {
        $contactsController->index();
    });
    
    $router->respond('GET', '/[:id]/delete', function($request) use ($contactsController)
    {
        $contactsController->deleteContact($request->id);
    });

    $router->respond('POST', '/?', function($request) use ($contactsController)
    {
        $contactsController->postContact($request->paramsPost());
    });
});

$router->respond('404', function ($request) use ($contactsController) {
    $contactsController->error_404();
});

$router->dispatch();
