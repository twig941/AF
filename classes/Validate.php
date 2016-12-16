<?php

class Validate {
    
    function __construct($username = null, $email = null, $password = null) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    
    function isEmail() {
        /*
        checks if something is a valid email address
        */
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }
    
    
    
    
   
    
    
    
   private $username;
   private $email;
   private $password;
    
    
}
?>