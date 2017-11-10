<?php
/**
 * Created by PhpStorm.
 * User: pandora
 * Date: 10/11/17
 * Time: 00:25
 */

namespace Kirby4link\Model;

class Manager{
    protected $db;

    public function __construct()
    {
        $this->db = new \PDO(DSN,USER,PASS);

    }
}