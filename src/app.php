<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

ini_set('display_errors', E_ALL);
ini_set('memory_limit', '2048M');

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

require __DIR__ . '/../app/providers.php';
require __DIR__ . '/../app/services.php';
require __DIR__ . '/../app/middlewares.php';
require __DIR__ . '/../app/routes.php';

return $app;
