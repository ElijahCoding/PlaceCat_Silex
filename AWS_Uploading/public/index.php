<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application([
  'debug' => true
]);

$app->get('/', function () use ($app) {
  return 'home';
});

$app->run();
