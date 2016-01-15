<?php

require_once __DIR__ . '/../vendor/autoload.php';

$cfgvar = get_cfg_var('phaplus.env');
$env    = !empty($cfgvar) ? $cfgvar : 'dev';
//Dotenv::load(realpath(__DIR__ . '/../config'), '.env.' . $env);

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
    realpath(__DIR__ . '/../')
);

//服务容器静态接口
$app->withFacades();

//是否启用认证
//$app->withEloquent();

//注册服务到容器中
$app->singleton(
    'Illuminate\Contracts\Debug\ExceptionHandler',
    'App\Exceptions\Handler'
);

$app->singleton(
    'Illuminate\Contracts\Console\Kernel',
    'App\Console\Kernel'
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
//     // 'Illuminate\Cookie\Middleware\EncryptCookies',
//     // 'Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse',
//     // 'Illuminate\Session\Middleware\StartSession',
//     // 'Illuminate\View\Middleware\ShareErrorsFromSession',
//     // 'Laravel\Lumen\Http\Middleware\VerifyCsrfToken',
// ]);

// $app->routeMiddleware([

// ]);

//注册服务提供者
// $app->register('App\Providers\AppServiceProvider');

//加载路由
require __DIR__ . '/../app/Http/routes.php';

return $app;
