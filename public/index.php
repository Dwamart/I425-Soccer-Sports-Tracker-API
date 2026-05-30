<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

use Slim\Factory\AppFactory;
use App\Models\League;

$app = AppFactory::create();

$app->setBasePath('/I425/I425-Soccer-Sports-Tracker-API/public');

$app->addRoutingMiddleware();

$app->get('/leagues', function ($request, $response) {

    $leagues = League::all();

    $response->getBody()->write(
        $leagues->toJson()
    );

    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->run();