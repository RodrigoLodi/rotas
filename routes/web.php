<?php
$routes = [
    '/' => 'HomeController@index',
    '/users' => 'UserController@index',
    '/users/show/{id}' => 'UserController@show',
    '/produtos' => 'ProductController@index',
    '/produtos/{id}' => 'ProductController@show',
    '/login' => 'LoginController@index',
];
