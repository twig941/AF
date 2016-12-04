<?php


class Announcement extends database {
    
    function __construct($host, $username, $password, $DB=null) {
        parent::__construct($host, $username, $password, $DB);
    }
    
    function createAnnouncementTable() {
        $query = "CREATE TABLE announcements (
        ID INT(11) PRIMARY KEY AUTO_INCREMENT,
        ANNOUNCEMENT VARCHAR(200) NOT NULL
        )";
        $this->connection->query($query);
    }
    
    function selectAnnouncement($number) {
      
       
      $query =  "SELECT * FROM announcements ORDER BY ID DESC LIMIT 1 OFFSET $number";
         
     if ($result = $this->connection->query($query)) {
        
        while ($row = $result->fetch_assoc()) {
           
            return $row["ANNOUNCEMENT"];
        }
        
    }
        
       return "error something went wrong";
    
    
}
    
    
    function updateAnnouncement($announce1, $announce2, $announce3) {
        $query = "INSERT INTO announcements (ANNOUNCEMENT) VALUES ('$announce1'), ('$announce2'), ('$announce3')";
        if ($this->connection->query($query)) return true;
        return false;
    }


}









?>