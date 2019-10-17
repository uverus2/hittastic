<?php 

class db {
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "123456";
    private $dbname = "users";

    // connect 
    public function connect() {
        $my_sql = "mysql:host=$this->dbhost;dbname=$this->dbname";
        $dbConnection = new PDO ($my_sql, $this->dbuser, $this->dbpass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
}

?> 