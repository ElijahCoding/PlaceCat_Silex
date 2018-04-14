<?php

use Symfony\Component\HttpFoundation\{Request, Response};

$app->get('/{width}/{height}', function(Request $request, Silex\Application $app) {

  $image = $app['db']->fetchAssoc("SELECT filename FROM images ORDER BY rand() LIMIT 1");



  return new Response(null, 200);
})->assert('width', '[0-9]+')->assert('height', '[0-9]+');
