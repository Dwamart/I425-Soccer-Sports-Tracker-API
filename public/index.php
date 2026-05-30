<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

use Slim\Factory\AppFactory;
use App\Models\League;
use App\Models\Team;
use App\Models\Player;
use App\Models\Season;

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

$app->get('/leagues/{id}', function ($request, $response, $args) {

    $league = League::find($args['id']);

    $response->getBody()->write(
        json_encode($league)
    );

    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/leagues/{id}/seasons', function ($request, $response, $args) {

    $league = League::find($args['id']);

    $response->getBody()->write(
        $league->seasons->toJson()
    );

    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/teams', function ($request, $response) {

    $teams = Team::all();

    $response->getBody()->write(
        $teams->toJson()
    );

    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/teams/{id}', function ($request, $response, $args) {

    $team = Team::find($args['id']);

    $response->getBody()->write(
        json_encode($team)
    );

    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/players', function ($request, $response) {

    $players = Player::all();

    $response->getBody()->write(
        $players->toJson()
    );

    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/players/{id}', function ($request, $response, $args) {

    $player = Player::find($args['id']);

    $response->getBody()->write(
        json_encode($player)
    );

    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/players/{id}/teams', function ($request, $response, $args) {

    $player = Player::find($args['id']);

    $response->getBody()->write(
        $player->teams->toJson()
    );

    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->run();