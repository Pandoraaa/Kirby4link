<?php

namespace Kirby4link\Controllers;
use Kirby4link\Model\ModelManager;

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

    /**
     * @return string
     */
    public function addUserAction(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $errors = [];
            foreach ($_POST as $key => $value){
                if (empty($_POST[$key])) {
                    $errors[$key] = "Veuillez renseigner le champ " . $key;
                }
            }

            if (!empty($errors)){
                return $this->twig->render('form.html.twig', array(
                    'errors' => $errors
                ));
            }
            else{
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $pseudo = $_POST['pseudo'];
                $date = $_POST['date'];
                $adresse = $_POST['adresse'];
                $manager = new ModelManager();
                $manager->addUser($nom, $prenom, $pseudo, $date, $adresse);
            }

        }
        return $this->twig->render('base.html.twig');

    }
}
