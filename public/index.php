<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

use Slim\Factory\AppFactory;
use App\Models\League;
use App\Models\Team;

$app = AppFactory::create();

$app->setBasePath('/I425/I425-Soccer-Sports-Tracker-API/public');

$app->addRoutingMiddleware();

$app->get('/api/v1/leagues', function ($request, $response) {

    $response->getBody()->write(
        League::all()->toJson()
    );

    return $response->withHeader(
        'Content-Type',
        'application/json'
    );
});

$app->get('/api/v1/leagues/{id}', function ($request, $response, $args) {

    $response->getBody()->write(
        json_encode(
            League::find($args['id'])
        )
    );

    return $response->withHeader(
        'Content-Type',
        'application/json'
    );
});

$app->get('/api/v1/teams', function ($request, $response) {

    $response->getBody()->write(
        Team::all()->toJson()
    );

    return $response->withHeader(
        'Content-Type',
        'application/json'
    );
});

$app->get('/api/v1/teams/{id}', function ($request, $response, $args) {

    $response->getBody()->write(
        json_encode(
            Team::find($args['id'])
        )
    );

    return $response->withHeader(
        'Content-Type',
        'application/json'
    );
});

$app->run();