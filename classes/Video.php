<?php

class Video extends database {
   
    function __construct($host, $username, $password, $DB) {
        parent::__construct($host, $username, $password, $DB);
    }
    
    function createVideoTable() {
        $query = "CREATE TABLE IF NOT EXISTS YOUTUBE_AF_VIDEOS (
        ID INT(11) PRIMARY KEY AUTO_INCREMENT,
        VIDEO_LINK VARCHAR(1000) NOT NULL,
        MEMBERS VARCHAR(1000) NOT NULL,
        VIDEO_TITLE VARCHAR(1000) NOT NULL,
        VIDEO_DESCRIPTION VARCHAR(10000) NOT NULL
        )";
        $this->connection->query($query);
    }
    
    function linkToEmbed($link) {
        /*
        takes a link from a youtube video and embeds it into an iframe
        */
        return preg_replace(
		"/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
		"<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
		$link
	);
    }
    
    
    function displayAddingVideoInterface() {
        $form = "<form method = 'POST' action = '' id = 'video-form'>
        <div style = 'text-align:center; margin-top:4%;'>
        <label> Video Link </label> <input type = 'text' name = 'video-link'>
        <label> Title </label> <input type = 'text' name = 'title'>
        <label> AF Members </label> <input type = 'text' name = 'Members'>
        <label> Description </label> <textarea name = 'description'> </textarea>
        <br>
        <input type = 'submit' name = 'submit' value = 'submit'>
        </div>
        </form>
        ";
        echo $form;
    }
    
    
    function insertVideoInfo($videoLink, $members, $videoTitle, $videoDescription) {
        $query = "INSERT INTO youtube_af_videos (VIDEO_LINK, MEMBERS, VIDEO_TITLE, VIDEO_DESCRIPTION) VALUES('$videoLink', '$members', '$videoTitle', '$videoDescription')";
        $this->connection->query($query);
    }
    
    
    function getLastVideoField($field) {
        $query = "SELECT $field FROM youtube_af_videos ORDER BY ID DESC LIMIT 1";
        if ($result = $this->connection->query($query)) {
            while($row = $result->fetch_assoc()) {
                return $row[$field];
            }
        }
    }
    
    
    
    
    
    
    
    
    
}
?>