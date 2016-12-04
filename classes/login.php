<?php

class login extends database {
    
    function __construct($host, $username, $password, $DB=null, $usernameOrEmail1, $password1) {
        parent::__construct($host,$username, $password, $DB);
        $this->usernameOrEmail = $usernameOrEmail1;
        $this->password = $password1;
    }
    
    /*
    function checkLogin($table) {
        
        The login would consist of a username or the appropriate email and if the password 
        is equal to that of the username or email true will be returned.
        
        $stmt = $this->connection->prepare("SELECT POSITION FROM {$table} WHERE USERNAME = ? AND PASSWORd = ?");
        if (!$stmt) {
            echo "f1";
        }
        if (!$stmt->bind_param("ss", $this->usernameOrEmail, $this->password)) {
            echo "f2";
        }
        else {
            echo "f3";
        }
        $stmt->execute();
        $stmt->bind_result($POSITION);
        if (!$stmt->bind_result($POSITION)) {
            echo "f4";
        }
        while ($stmt->fetch()) {
             echo $POSITION;
        echo "c";
        }
       echo $POSITION;
        echo "c";
        
        
        
    }
    */
    
    function checkLogin($table) {
        if($this->isEmail()) { 
            $query = "SELECT email, password FROM {$table}";
         $result = $this->connection->query($query);
            while ($row = $result->fetch_assoc()) {
               if ($row["password"] === $this->password) {
                   return true;
               }
                else {
                    return false;
                }
            }
            
            
        }
        else { 
            $query = "SELECT username, password FROM {$table}";
            $result = $this->connection->query($query);
            while ($row = $result->fetch_assoc()) {
                 if ($row["password"] === $this->password) {
                  return true;
               }
                else {
                    return false;
                }
            }
        }
        
        
        
    }
    function isEmail() {
        /*
        checks if something is a valid email address
        */
        if (filter_var($this->usernameOrEmail, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }
    
    
    private $usernameOrEmail;
    private $password;
    
}


?>