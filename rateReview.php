<?php

/*if both the $_POST array and the id are set we will increment by the id */
if (isset($_POST)) {
    require_once"init.php";
    $userReview = new Reviews("localhost", "AlexG", "Ducktalesz1", "THE_ARTISTS_FORUM");
    $id = $_POST["id"];
    //first field to increment will be the rating
    $firstField = "articleRating";
    $rating = $_POST["userRating"];
    $userReview->incrementField($firstField, $id, $rating);
    //then increment the review count
    $secondField = "timesRated";
    $value = 1;
    $userReview->incrementField($secondField, $id, $value);
    echo $userReview->getRating($id);
}
/*if the id is not set just display the most recent article */
else {
    echo "no";
}

?>