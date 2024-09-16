<?php

use RapidRoute\Router;

require __DIR__.'/vendor/autoload.php';
require './TestController.php';

$router = new Router();

$router->add('GET', '/user', function () {
    $form = <<<FORM
    <h3>Cadastro</h3>
    <form action="/user" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="E-mail">
        <input type="submit" value="Cadastrar">
    </form>
    FORM;
    echo $form;
});

$router->add('POST', '/user', function () {
    foreach ($_POST as $data) {
        echo $data . '<br>';
    }
});

$router->add('GET', '/user/{id}', function ($id) {
    echo $id;
});

$router->add('GET', '/users/{id?}', function ($id = 'opcional') {
    echo $id;
});

$router->add('GET', '/user/{id}/special', function ($id) {
    echo $id;
});

$router->add('GET', '/user/{id}/{local}', function ($id, $local) {
    echo $id . ' | ' . $local;
});

$router->add('GET', '/store', [TestController::class, 'store']);

$router->dispatch(); // Dispatch the request to the appropriate route.
