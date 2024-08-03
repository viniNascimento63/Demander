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

$app->post('/romano', function() {
    $num = $_POST['indo-arabicos'];
    $result = Conversor::parseToRoman($num);
    $page = new Page();
    $page->setTemplate('index', 
        array(
            'indo' => $num,
            'romano' =>  $result
        )
    );
});

$app->post('/indo-arabico', function() {
    $num = $_POST['romanos'];
    $result = Conversor::parseToIndo($num);
    $page = new Page();
    $page->setTemplate('index', 
        array(
            'romano' => $num,
            'indo' => $result
        )
    );
});

$app->config('debug', true);

$app->run();
