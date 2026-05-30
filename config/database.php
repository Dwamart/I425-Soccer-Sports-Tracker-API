<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$settings = require __DIR__ . '/settings.php';

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $settings['db']['host'],
    'database'  => $settings['db']['dbname'],
    'username'  => $settings['db']['user'],
    'password'  => $settings['db']['pass'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
