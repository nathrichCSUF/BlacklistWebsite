<?php

$dbc = mysqli_connect("localhost", "root", "", "BlacklistWebsite");
if (!$dbc) {
  echo "Cannot connect to MySQL. " . mysqli_connect_error();
  exit();
}

if(mysqli_ping($dbc)){
  echo 'MySQL Server ' . mysqli_get_server_info($dbc).
        ' connected on ' . mysqli_get_host_info($dbc);
}
?>
