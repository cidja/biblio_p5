<?php
namespace cidja\managerDb;

use \PDO;
use \PDOException;
class Model_ManagerDb 
{
    protected function dbConnect()
{
    //source: https://my.ionos.fr/pdo-extension/dbs224218
    $host_name = 'db5000262470.hosting-data.io';
    $database = 'dbs256083';
    $user_name = 'dbu430244';
    $password = 'Uv9U={d9C8(w';
    $dbh = null;
    try
    {
        $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
        return $db;

    }
    catch (PDOException $e) {
        echo "Erreur!: " . $e->getMessage() . "<br/>";
        die();
    }
}
}