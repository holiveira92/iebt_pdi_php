<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Main\Application;

$app = new Application();

$app->router->get('/', function() {
    echo "HOME IEBT PHP";
});

$app->router->get('/iebt', function() {
    echo "IEBT";
});

$app->router->get('/php', function() {
    echo "PHP";
});

function pre($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}

$app->run();
