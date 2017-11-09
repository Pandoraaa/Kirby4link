<?php

namespace Kirby4link\Controllers;
/**
 * Class DefaultController
 * @package Kirby4link\Controllers
 */
class DefaultController extends Controller
{
    /**
     * @return string
     */
    public function indexAction(){
        return $this->twig->render('base.html.twig');
    }
}