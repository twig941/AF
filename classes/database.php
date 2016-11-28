<?php


class Database {
    
    function __construct($host, $username, $password, $DB=null) {
        $this->connection = new mysqli($host, $username, $password, $DB);
    }
    
    function createMasterLoginTable() {
        $query = "CREATE TABLE IF NOT EXISTS AF_WEBMASTER_LOGIN(
        ID INT(11) PRIMARY KEY AUTO_INCREMENT,
        USERNAME VARCHAR(100) NOT NULL,
        PASSWORD VARCHAR(100) NOT NULL,
        NAME VARCHAR(100) NOT NULL,
        POSITION VARCHAR(100) NOT NULL
        )";
        $this->connection->query($query);
    }
    
    
    
 protected $connection;   
}








?>