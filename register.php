<?php
// Connect to the BlacklsitWebsite database
$dbc = mysqli_connect("localhost", "root", "", "BlacklistWebsite");
if (!$dbc) {
  echo "Cannot connect to MySQL. " . mysqli_connect_error();
  exit();
}

// Take user input from create_account.html and insert into accounts table
$username = $_POST['username'];
$password = $_POST['password'];
$q = "INSERT INTO accounts(Username, Password)
      VALUES('$username','$password')";
$r = mysqli_query($dbc, $q);
if (!$r) {
  echo ("Insert into account failed. " .
    mysqli_error($dbc));
  exit();
}
else {
  echo ("Account successfully created!");
}
?>
