<?php

class Video extends database {
   
    function __construct($host, $username, $password, $DB) {
        parent::__construct($host, $username, $password, $DB);
    }
    
    function createVideoTable() {
        $query = "CREATE TABLE IF NOT EXISTS YOUTUBE_AF_VIDEOS (
        ID INT(11) PRIMARY KEY AUTO_INCREMENT,
        VIDEO_LINK VARCHAR(255) NOT NULL,
        MEMBERS VARCHAR(255) NOT NULL,
        VIDEO_TITLE VARCHAR(255) NOT NULL,
        VIDEO_DESCRIPTION VARCHAR(1000) NOT NULL
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>