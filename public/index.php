<?php

declare(strict_types=1);

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

require_once __DIR__ . "/../vendor/autoload.php";

$router = new RouteCollector();

$router->any("/", function () {
    return "This is the homepage";
});

$router->get("/products/{id:\d+}", function ($id) {
    return "This is the page for product $id";
});

$dispatcher = new Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER["REQUEST_METHOD"], $path);

echo $response;

/*
require "Router.php";
$router = new Router;
$router->add("/", function() {
    echo "This is the homepage";
});
$router->add("/about", function() {
    echo "This is the about page";
});
$router->add("/products/{id}", function($id) {
    echo "This is the page for product $id";
});
$router->add("/products/{id}/orders/{order_id}", function($id, $order_id) {
    echo "This is the page for product $id, and order $order_id";
});
$router->dispatch($path);
*/

/*
switch ($path) {
    case "/":
        echo "This is the homepage";
        break;
    case "/about":
        echo "This is the about page";
        break;
    case "/contact":
        echo "This is the contact page";
        break;
    default:
        echo "Page not found";
}
*/
