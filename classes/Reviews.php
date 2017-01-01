<?php
class Reviews extends Database {
    
     function __construct($host, $username, $password, $DB) {
        parent::__construct($host, $username, $password, $DB);
    }
    /**
    creates the table that will be used to check if there is a naming conflict with images
    */
    function createImageTable() {
        $query = "CREATE TABLE IF NOT EXISTS reviewImages (
        ID INT(11) Primary key AUTO_INCREMENT,
        Path VARCHAR(200) NOT NULL
        )";
        $this->connection->query($query);
    }
    
    function uploadImages(array $fileArray) {
       
    }
    
    
}
?>