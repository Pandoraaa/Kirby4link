<?php

namespace Kirby4link\Model;

/**
 * Class ModelManager
 * @package Kirby4link\Model
 */

class ModelManager extends Manager
{
    public function addUser($nom, $prenom, $pseudo, $date, $adresse){
        $req=$this->db->prepare("INSERT INTO user (nom, prenom, pseudo, date, adresse) VALUES (:nom, :prenom, :pseudo, :date, :adresse)");
        $req->execute([
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':pseudo'=>$pseudo,
            ':date'=>$date,
            ':adresse'=>$adresse
        ]);
    }
}