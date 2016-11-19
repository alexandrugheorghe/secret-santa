<?php

$apiMiddleware = ['cors', 'wam-token'];

Route::group(
    [
        'middleware' => $apiMiddleware,
    ],
    function(\Illuminate\Routing\Router $router) {
        $router->get('/mock/hints', 'HintController@indexMock');
        $router->get('/hints', 'HintController@index');
        $router->post('/users', 'UserController@postRaffle');
    }
);
