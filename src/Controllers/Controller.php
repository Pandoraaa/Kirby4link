<?php

namespace Kirby4link\Controllers;

use Twig_Loader_Filesystem;
use Twig_Environment;
use Twig_Extension_Debug;

/**
 * Class Controller
 * @package Kirby4link\Controllers
 */
class Controller
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__ . "/../Views/");
        $this->twig = new Twig_Environment($loader, array(
            'cache' => false,
            'debug' => true
        ));
        $this->twig->addExtension(new Twig_Extension_Debug());
    }
}