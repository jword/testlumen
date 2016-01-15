<?php

require_once __DIR__ . '/../vendor/autoload.php';
//设置环境变量
$cfgvar = get_cfg_var('phaplus.env');
$env    = empty($cfgvar) ? 'dev' : $cfgvar;
putenv('APP_TIMEZONE=PRC');
putenv("APP_ENV=$env");

//创建应用
$app = new Laravel\Lumen\Application(
    realpath(__DIR__ . '/../')
);
$app->useConfigpath($app->basePath('config/' . $env));
$app->configure('app');
//服务容器静态接口
$app->withFacades();

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
