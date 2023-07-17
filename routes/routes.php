<?php

use App\Services\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/a-propos', 'AboutController@index');
$router->get('/commentaires', 'CommentController@index');
$router->get('/occasions', 'OccasionController@index');

$router->get('/connexion', 'LoginController@index');
$router->post('/connexion', 'LoginController@login');

$router->post('/logout', 'UserController@logout');

$router->get('/user', 'UserController@index');
$router->post('/user', 'UserController@addUser');

$router->get('/user/edit/{id}', 'UserController@showEditForm');
$router->post('/user/edit/{id}', 'UserController@edit');
$router->get('/user/delete/{id}', 'UserController@delete');

$router->get('/car', 'CarController@index');
$router->post('/car', 'CarController@addCar');

$router->get('/admin', 'UserController@index');

return $router;