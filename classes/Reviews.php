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
    
    function createReviewTable() {
        $query = "CREATE TABLE IF NOT EXISTS reviewInfo (
        ID INT(11) PRIMARY KEY AUTO_INCREMENT,
        articleTitle VARCHAR(1000) NOT NUll,
        whoFor VARCHAR(1000) NOT NULL,
        editors VARCHAR(1000) NOT NULL,
        photoCredit VARCHAR(1000) NOT NULL,
        Content MEDIUMTEXT NOT NULL,
        pageviews INT(11) DEFAULT 0
        )";
        $this->connection->query($query);
    }
    
    function insertReviewInfo($title, $whoFor, $editors, $photoCredit, $content) {
        $query = "INSERT INTO reviewInfo (articleTitle, whoFor, editors, photoCredit, Content) VALUES('$title', '$whoFor', '$editors', '$photoCredit', '$content')";
        $this->connection->query($query);
    }
    
    
    function displayReview($id) {
        $query = "SELECT * FROM reviewInfo WHERE id = $id";
        if ($result = $this->connection->query($query)) {
            while($row = $result->fetch_assoc()) {
                echo "A PICTURE WOULD GO HERE";
                echo "<div class = 'review-title'>";
                echo $row["articleTitle"];
                echo "</div>";
                echo "<div class = 'review-numberViewed'>";
                echo "Times views: " . $row["pageviews"];
                $this->incrementPageView($id);
                echo "</div>";
                echo "<div class = 'review-author'>";
                echo "By: " . "THE PERSONS NAME FROM THE LOGIN FROM SESSION";
                echo "</div>";
                echo "<div class = 'review-whoFor'>";
                echo $row["whoFor"];
                echo "</div>";
                echo "<div class = 'review-editor'>";
                echo "Editied By: " . $row["editors"];
                echo "</div>";
                echo "<div class = 'review-photoCredit'>";
                echo "Photo Credit: " . $row["photoCredit"];
                echo "</div>";
                echo "<div class = 'review-body'>";
                echo $row["Content"];
                echo "</div>";
            }
        }
        
    }
    
    function getLastId() {
        $query = "SELECT id FROM reviewInfo ORDER BY ID DESC LIMIT 1";
        if ($result = $this->connection->query($query)) {
            $row = $result->fetch_assoc();
           $id = $row["id"];
            settype($id, "integer");
            return $id;
        }
        
    }
    
    function incrementPageView($idToIncrement) {
        $query = "SELECT pageviews FROM reviewInfo WHERE id = $idToIncrement";
        if ($result = $this->connection->query($query)) {
            $row = $result->fetch_assoc();
           $pageviews = $row["pageviews"];
            settype($pageviews, "integer");
            $pageviews++;
            $query2 = "UPDATE reviewInfo SET pageviews = $pageviews WHERE id = $idToIncrement";
            $this->connection->query($query2);
        }
    }
    
    function findImage($content) {
        $StringToFind = "<img";
        $pos = strpos($content, $StringToFind);
        if (!($pos === false)) {
            return $pos;
        }
        return 1;
    }
    
    
}
?>