<?php

use Illuminate\Routing\Router;


Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');

    // 收集数据主页

    $router->resource('driver-surveys', DriverSurveyController::class);
});
