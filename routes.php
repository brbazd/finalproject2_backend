<?php

// ViewController routes

$router->get('','ViewController@home');
$router->get('view/images','ViewController@viewImages');
$router->get('view/tags','ViewController@viewTags');
$router->get('add/image','ViewController@viewAddImage');
$router->get('add/tag','ViewController@viewAddTag');
$router->get('edit/image','ViewController@viewEditImage');
$router->get('edit/tag','ViewController@viewEditTag');
$router->get('register','ViewController@viewRegister');
$router->get('login','ViewController@viewLogin');

// ImagesController routes

$router->post('add/image','ImagesController@addImage');
$router->post('edit/image','ImagesController@updateImage');
$router->get('delete/image','ImagesController@deleteImage');

// TagsController routes

$router->post('add/tag','TagsController@addTag');
$router->post('edit/tag','TagsController@updateTag');
$router->get('delete/tag','TagsController@deleteTag');
$router->get('unlink','TagsController@unlink');

// AuthController routes

$router->post('register','AuthController@register');
$router->post('login','AuthController@login');
$router->get('logout','AuthController@logout');
$router->get('delete/user','AuthController@delete');

// UsersController routes


// ApiController routes

$router->get('api/images','ApiController@displayImagesFromTagBy12');
$router->get('api/gallery','ApiController@displayTagsWithOneImage');
$router->get('api/featured','ApiController@displayFirst3Tags');
