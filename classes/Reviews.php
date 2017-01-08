<?php
class Reviews extends Database {
    
     function __construct($host, $username, $password, $DB) {
        parent::__construct($host, $username, $password, $DB);
    }
    /**
    creates the table that will be used to check if there is a naming conflict with images
    */
 
    
    function createReviewTable() {
        $query = "CREATE TABLE IF NOT EXISTS reviewInfo (
        ID INT(11) PRIMARY KEY AUTO_INCREMENT,
        articleTitle VARCHAR(1000) NOT NUll,
        whoFor VARCHAR(1000) NOT NULL,
        editors VARCHAR(1000) NOT NULL,
        photoCredit VARCHAR(1000) NOT NULL,
        Content MEDIUMTEXT NOT NULL,
        articleRating FLOAT(11, 2) DEFAULT 5,
        timesRated INT(11) DEFAULT 1,
        pageviews INT(11) DEFAULT 0
        )";
        $this->connection->query($query);
    }
    
    
    /**
    *the review contains will allow some html tags
    *all inline javascript events will be filtered out
    */
    function cleanReview($data) {
        $data = $this->connection->real_escape_string($data);
        $data = strip_tags($data, '<br><img><figure><figcaption><i>');
        $forbidden_javascript = array("onafterprint", "onbeforeprint", "onbeforeunload", "onerror", "onhashchange", "onload", "onmessage", "onoffline", "ononline", "onpagehide", "onpageshow", "onpopstate", "onresize", "onstorage", "onunload", "onblur", "onchange", "oncontextmenu", "onfocus", "oninput", "oninvalid", "onreset", "onsearch", "onselect", "onsubmit", "onkeydown", "onkeypress", "onkeyup", "onclick", "ondblclick", "onmousedown", "onmousemove", "onmouseout", "onmouseover", "onmouseup", "onmousewheel", "onwheel", "ondrag", "ondragend", "ondragenter", "ondragleave", "ondragover", "ondragstart", "ondrop", "onscroll", "oncopy", "oncut", "onpaste", "onabort", "oncanplay", "oncanplaythrough", "oncuechange", "ondurationchange", "onemptied", "onended", "onerror", "onloadeddata", "onloadedmetadata", "onloadstart", "onpause", "onplay", "onplaying", "onprogress", "onratechange", "onseeked", "onseeking", "onstalled", "onsuspend", "ontimeupdate", "onvolumechange", "onwaiting", "onshow", "ontoggle");
        $data = str_replace($forbidden_javascript, "", $data);
        return $data;
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
                echo '  <div>
    <span id = "star1" title = "Click to Rate">
       </span>
       
       <span id = "star2" title = "Click to Rate">
       </span>
       
       <span id = "star3" title = "Click to Rate">
       </span>
       
       <span id = "star4" title = "Click to Rate">
       </span>
       
       <span id = "star5" title = "Click to Rate">
       </span>
       
<span class="stars">' . $this->getRating($id) .
    
 
'</span>' . "<span id ='rating'>" . "RATING " . number_format($this->getRating($id),2) . " OUT OF 5 </span>" . '
       
       </div>';
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
    
    
    /**
    computes the rating of the article
    */
    function getRating($id) {
        $query = "SELECT articleRating, timesRated FROM reviewinfo WHERE id = $id";
        if ($result = $this->connection->query($query)) {
            $row = $result->fetch_assoc();
            return number_format($row["articleRating"] / $row["timesRated"],2);
        }
    }
    
    function incrementField($field, $id, $value) {
        $query = "SELECT $field FROM reviewInfo WHERE id = $id";
        if ($result = $this->connection->query($query)) {
            $row = $result->fetch_assoc();
           $fieldNameValue = $row[$field];
            settype($fieldNameValue, "float");
            $fieldNameValue +=$value;
            $query2 = "UPDATE reviewInfo SET $field = $fieldNameValue WHERE id = $id";
            $this->connection->query($query2);
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