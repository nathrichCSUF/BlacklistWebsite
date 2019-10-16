<?php
require ('../connect_db.php');
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
?>
