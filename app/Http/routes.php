<?php

Route::group(['middleware' => 'cors'], function(\Illuminate\Routing\Router $router){
    $router->get('/hints', 'HintController@getDummies');
    $router->get('/dev/hints', 'HintController@index');
});
