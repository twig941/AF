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
    
    
    /**
    If the session is not active show a form for people
    */
    function allowStrangerComments() {
       echo "<form>";
        echo '
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" placeholder="Enter Your Name">
    </div>
    <div class="form-group">
      <label for="email">Password:</label>
      <input type="email" class="form-control" placeholder="Enter your email">
    </div>
    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" id="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>';
  echo "</form>";
    }
    
    
    function createCommentsTable() {
        $query = "CREATE TABLE IF NOT EXISTS Comments (
        ID INT(11) PRIMARY KEY AUTO_INCREMENT,
        Associated_article_id INT(11),
        username VARCHAR(255) NOT NULL,
        Comment_text VARCHAR(2500) NOT NULL,
        is_approved BIT(1) DEFAULT 0
        )";
        $this->connection->query($query);
    }
    
    
    
}





?>