<?php

require '../vendor/autoload.php';

use Kirby4link\Controllers\DefaultController;

$defaultController = new DefaultController();

if (empty($_GET)){
    echo $defaultController->indexAction();
}