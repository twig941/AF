<?php

class login extends database {
    
    function __construct($host, $username, $password, $DB=null) {
        parent::__construct($host,$username, $password, $DB);
    }
    
    function checkLogin($table, $username, $password) {
        $query = "SELECT username, password FROM '$table'";
        
        
        if ($result = $this->connection->query($query)) {
            while($row = $result->fetch_assoc()) {
                if ($row["username"] === $username && $row["password"]) {
                    
                }
            }
        }
        
        
        
        
    }
    
    
}


?>