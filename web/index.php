<?php

require __DIR__ . '/../vendor/autoload.php';

$routes = require __DIR__ . '/../app/routes.php';

$bootstrap = new \Oira\Bootstrap();

$request_uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$not_found = function() {
    return [404, ['Content-Type' => 'text/html'], "<h1>404 Not Found</h1>"];
};

$f = $routes[$request_uri] ?? $not_found;
[$status, $headers, $body] = $f();
http_response_code($status);
foreach ($headers as $name => $h) {
    header("{$name}: {$h}");
}

/*
var_dump($_SERVER["REQUEST_URI"]);
var_dump($request_uri);
var_dump($_GET);
 */
echo $body;
