<?php

$apiMiddleware = ['cors', 'wam-token'];

Route::group(
    [
        'middleware' => $apiMiddleware,
    ],
    function(\Illuminate\Routing\Router $router) {
        $router->get('/hints', 'HintController@getDummies');
        $router->get('/dev/hints', 'HintController@index');
        $router->post('/users', 'UserController@postRaffle');
    }
);
