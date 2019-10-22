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
$user_id=$_POST['userID'];
// Insert into the db
$q = "INSERT INTO blackmail VALUES('$post_id','$bm_title','$description','$demands','$imageURL',false,'0','0','$user_id')";
$r = mysqli_query($dbc, $q); //Execute query
if (!$r) {
    echo "<div class='create-wrapper'>";
    echo "<div class='create-container'>";
    echo "Could not Post Blackmail " . mysqli_error($dbc);
    echo "<a href='index.php'><button type='button'>Return to homepage</button></a>";
    echo "</div>";
    echo "</div>";
    exit();
}
else{
  echo "<div class='create-wrapper'>";
  echo "<div class='create-container'>";
  echo "<h1>Blackmail posted successfully</h1>";
  echo "<a href='index.php'><button type='button'>Return to homepage</button></a>";
  echo "</div>";
  echo "</div>";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheets/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Palanquin+Dark&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
      <!-- <a href="index.php"><button type="button">Return to homepage</button></a> -->
  </body>
</html>
