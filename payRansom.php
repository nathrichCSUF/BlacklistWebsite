<?php
// Make connection
$dbc = mysqli_connect("localhost", "bl_user", "TheBoys123!", "blacklistwebsite");
if (!$dbc) {
    echo "Cannot connect to MySQL. " . mysqli_connect_error();
    exit();
}
mysqli_set_charset($dbc, 'utf8');

// put PostId into $postid
$postid = $_POST['PostId'];
$q = "UPDATE blackmail
      SET isPaid = 1
      WHERE PostId = '$postid'";
      
// make query
$r = mysqli_query($dbc, $q);

if (!$r) {
    echo "Update isPaid failed. " . mysqli_error($dbc);
    exit();
}

echo "<h1>The ransom has been paid.</h1>";
echo "<a href='index.php'><button type='button'>Return to homepage</button></a>";

?>
