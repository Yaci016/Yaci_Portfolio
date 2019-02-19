<?php

/**

 * Created by PhpStorm.

 * User: wali7

 * Date: 12/11/18

 * Time: 14:24

 */



namespace restaurant\model\ClassMixte;





class Manager

{

protected function dbConnect(){



    $servername = "?";

    $username = "?";

    $password = "?";

    $database = "?";

    $charset = "?";

    try {

        $bdd = new \PDO("mysql:host=$servername;dbname=$database;charset=$charset", $username, $password);

        // set the PDO error mode to exception

        $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    } catch(\PDOException $e) {

        echo "Connection failed: " . $e->getMessage();

    }

    return $bdd;



}



}