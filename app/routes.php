<?php

$routes = [];
$template = new \Src\TemplateFactory((__DIR__ . '/view/'));

$routes['/'] = function () use ($template) {
    return [200, ['Content-Type' => 'text/html'], $template->create('index', [
        'name' => 'My name is Taro'
    ])];
};

return $routes;