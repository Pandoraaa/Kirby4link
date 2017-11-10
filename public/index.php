<?php

require_once '../vendor/autoload.php';
require_once '../app/config.php';

use Kirby4link\Controllers\DefaultController;

$defaultController = new DefaultController();

if (empty($_GET)){
    echo $defaultController->indexAction();
}

elseif ($_GET['section']==='add'){
    echo $defaultController->addUserAction();

}