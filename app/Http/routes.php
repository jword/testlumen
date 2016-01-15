<?php
$app->group(array('namespace' => 'App\Http\Controllers'), function () use ($app) {
    $app->get('/', 'HomeController@index');
    $app->get('ask/{id:[0-9]+}', 'HomeController@get');
    $app->post('ask/add', 'HomeController@add');
    $app->post('ask/update/{id:[0-9]+}', 'HomeController@update');
});
