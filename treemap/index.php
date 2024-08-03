<?php

require_once("vendor/autoload.php");

use Slim\Slim;
use Demander\Conversor;
use Demander\Page;

$app = new Slim();

$app->get('/', function() {
    $page = new Page();
    $page->setTemplate('index');
});

$app->config('debug', true);

$app->run();
