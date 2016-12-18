<?php


class Ad extends Database {
    
      function __construct($host, $username, $password, $DB) {
        parent::__construct($host, $username, $password, $DB);
    }
    
    function createAdTable() {
        $query = "CREATE TABLE IF NOT EXISTS AF_Advertisement (
        ID INT(11) PRIMARY KEY AUTO_INCREMENT,
        IMAGE_SOURCE VARCHAR(1000) NOT NULL
        )
        ";
        
        $this->connection->query($query);
    }
    
    function createAdFormForALink() {
      $form = "
      <form method = 'POST' action = '' id = 'ad-form'>
      <label>Link To Advertisement</label> <input type = 'text' name = 'linked-ad'>
      <input type = 'submit' value = 'submit' name = 'submit-link'>
      </form>
      ";
        return $form;
    }
    
    function createAdFormForAUpload() {
        $form = "
      <form method = 'POST' action = '' enctype='multipart/form-data' id = 'ad-form'>
      <input style = 'width:100%; text-align:center;' type = 'file' name = 'file-ad'>
      <input type = 'submit' value = 'submit' name = 'submit-upload'>
      </form>
      ";
        return $form;
    }
    
    function insertAdLink($link) {
        $query = "INSERT INTO af_advertisement (IMAGE_SOURCE) VALUES('$link')";
        $this->connection->query($query);
    }
    
    function getLastAdLocation() {
        $query = "SELECT IMAGE_SOURCE FROM af_advertisement ORDER BY ID DESC LIMIT 1";
        if ($result = $this->connection->query($query)) {
            while($row = $result->fetch_assoc()) {
                return $row["IMAGE_SOURCE"];
            }
        }
    }
    
    function uploadAd($directory, $tempName, $nameOfFile) {
    
    $path = $directory . "/" . $nameOfFile;
     if (move_uploaded_file($tempName, $directory . "/". $nameOfFile)) {
         $query = "INSERT INTO af_advertisement (IMAGE_SOURCE) VALUES('$path')";
        $this->connection->query($query);
         return true;
     }
    return false;
   
}
    
}






?>