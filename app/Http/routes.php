<?php

Route::group(['middleware' => 'cors'], function(\Illuminate\Routing\Router $router){
    $router->get('/hints', 'HintController@getDummies');
    $router->post('/users', 'UserController@postRaffle');
    $router->get('/dev/hints', 'HintController@index');
});
