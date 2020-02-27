<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

 
//  $app->register(Jenssegers\Mongodb\MongodbServiceProvider::class); //for mongodb use
$app->withFacades();
$app->withEloquent();
$app->configure('sluggable'); //for slug
$app->configure('permission');
config()->set('jwt.ttl', 60*60*7); //jwt auth expire
/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

// $app->middleware([
//     App\Http\Middleware\ExampleMiddleware::class
// ]);

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
    'admin' => App\Http\Middleware\Admin::class,
   'superadmin' => App\Http\Middleware\Superadmin::class,
   'permission' => Spatie\Permission\Middlewares\PermissionMiddleware::class,
    'role'       => Spatie\Permission\Middlewares\RoleMiddleware::class,
    
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

 $app->register(App\Providers\AppServiceProvider::class);
 $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);
 // Add for enable jwt auth
 $app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class); //for jwt auth register
 $app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class); // for Create  command 
 $app->register(Intervention\Image\ImageServiceProviderLumen::class); //for resize image
 $app->alias('cache', \Illuminate\Cache\CacheManager::class);  // if you don't have this already
 $app->register(Spatie\Permission\PermissionServiceProvider::class);
  
/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

return $app;
