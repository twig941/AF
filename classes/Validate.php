<?php

class Validate {
    
    function __construct($username = null, $email = null, $password = null) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    
    /*checks if the url query string is valid when searching by an id*/
    function isValidIdUrl($GET_ID) {
        if ($GET_ID > 0) {
            return true;
        }
        die("404 error page could not be found please enter a valid ID");
        return false;
    }
    
    
    
   
    
    
    
   private $username;
   private $email;
   private $password;
    
    
}
?>