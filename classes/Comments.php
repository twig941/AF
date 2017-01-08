<?php

class comments extends Database {
    
    function __construct($host, $username, $password, $DB) {
        parent::__construct($host, $username, $password, $DB);
    }
    
    
    /**
    If the session is active show the comment area
    */
    function allowUserComments() {
        echo "<form>";
        echo ' <div class="form-group">
  <label for="comment">Comment:</label>
  <textarea class="form-control" rows="5" id="comment"></textarea>
</div>';
        echo "</form>";
    }
    
    function createCommentsTable() {
        $query = "CREATE TABLE IF NOT EXISTS Comments (
        ID INT(11) PRIMARY KEY AUTO_INCREMENT,
        Associated_article_id INT(11),
        username VARCHAR(255) NOT NULL,
        Comment_text VARCHAR(2500) NOT NULL
        )";
        
    }
    
    
    
}





?>