<?php

namespace cidja\managerDb;

use \PDO;
use \FFI\Exception;

class Model_ManagerDb 
{
    protected function dbConnect()
{
    try
    {
        $db = new PDO("mysql:host=localhost;dbname=biblio;charset=utf8", "sudo", "boby06");
        return $db;

    }
    catch(Exception $e)
    {
        die("Erreur: " . $e->getMessage());
    }
}
}