<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application;

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider, [
    'twig.path' => __DIR__ . '/../views'
]);

$app->register(new Silex\Provider\DoctrineServiceProvider, [
  'db.options' => [
      'driver' => 'pdo_mysql',
      'host' => 'localhost',
      'dbname' => 'placecat',
      'user' => 'root',
      'password' => '',
      'charset' => 'utf8',
  ]
]);

$app->register(new App\Providers\UploadcareProvider);

$app->get('/', function () use ($app) {

  

  $images = $app['db']->prepare("SELECT * FROM aws_images");
  $images->execute();

  $images = $images->fetchAll(\PDO::FETCH_CLASS, \App\Models\Image::class);

  return $app['twig']->render('home.twig');
});

$app->run();
