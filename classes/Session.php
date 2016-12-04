<?php

class Session {
    
    function __construct() {
        
    }
    

            
            function displayUsername() {
                return $_SESSION["username"];
            }
    
    function checkUserLevel() {
        return $_SESSION["access_level"];
    }
    
    
  function is_session_started() {
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
    
}



?>