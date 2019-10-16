<?php

  $dbhost = "localhost";
  $dbuser = "bl_user";
  $dbpass = "TheBoys123!";
  $db = "blacklistwebsite";

  $conn = new mysqli ($dbhost,$dbuser, $dbpass, $db) or die("Connection Failed: %s\n". $conn -> error);

  echo "Good job";


 ?>
