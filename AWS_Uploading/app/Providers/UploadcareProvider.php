<?php

namespace AI\Providers;

use Silex\Application;
use Silex\ServiceProviderInterface;

class UploadcareProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['uploadcare'] = $app->share(function () use ($app) {
            return new \Uploadcare\Api('ceb03042320efbf93f39', 'a0015e5c57d4d017f7bc');
        });
    }

    public function boot(Application $app)
    {
        //
    }
}
