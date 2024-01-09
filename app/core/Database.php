<?php

namespace App\core;


use PDO;
use PDOException;


require "config.php";
class Database
{

    protected $DBNAME = DBNAME;
    protected $DBUSER = DBUSER;
    protected $DBHOST = DBHOST;
    protected $DBPASSWORD = DBPASSWORD;

    protected function connect()
    {
        try {
            $con = new PDO("mysql:host=$this->DBHOST;dbname=$this->DBNAME", $this->DBUSER, $this->DBPASSWORD);
            // set the PDO error mode to exception
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
