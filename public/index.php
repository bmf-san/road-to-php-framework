<?php

require __DIR__ . '/../vendor/autoload.php';

$routes = include __DIR__ . '/../app/routes.php';

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$not_found = function () {
    return [404, ['Content-Type' => 'text/html'], "404"];
};

$f = $routes[$request_uri] ?? $not_found;
[$status, $headers, $body] = $f();
http_response_code($status);

foreach($headers as $h) {
    header("{$name}: {$h}");
}

echo $body;