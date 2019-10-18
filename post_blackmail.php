<?php

// Connect to the BlacklsitWebsite database.
$dbc = mysqli_connect("localhost", "bl_user", "TheBoys123!", "blacklistwebsite");
if (!$dbc) {
    echo "Cannot connect to MySQL. " . mysqli_connect_error();
    exit();
}

mysqli_set_charset($dbc, 'utf8');

// Grab user input to post
$bm_title = $_POST['title'];
$demands = $_POST['demands'];
$description = $_POST['description'];
$imageURL = $_POST['imageURL'];
$post_id = rand(0,9999);
// Insert into the db
$q = "INSERT INTO blackmail VALUES('$post_id','$bm_title','$description','$demands','$imageURL',false,'0','0')";
$r = mysqli_query($dbc, $q); //Execute query
if (!$r) {
    echo "Could not Post Blackmail " . mysqli_error($dbc);
    exit();
}
else{
  echo "Blackmail posted successfully";
}

?>
