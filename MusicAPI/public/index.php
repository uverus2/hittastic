<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../src/config/db.php';

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);


$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");
    return $response;
});


// Customer Route

require '../src/Routes/customers.php';

$app->run();

?>