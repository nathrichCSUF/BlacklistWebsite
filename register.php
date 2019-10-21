<?php

// Connect to the BlacklsitWebsite database.
$dbc = mysqli_connect("localhost", "bl_user", "TheBoys123!", "blacklistwebsite");
if (!$dbc) {
    echo "Cannot connect to MySQL. " . mysqli_connect_error();
    exit();
}

mysqli_set_charset($dbc, 'utf8');

// Take user input from create_account.html and insert into accounts table.
$username = $_POST['username'];
$password = $_POST['password'];
$user_id = rand(0,99999);
// Select all usernames from accounts table
$q = "SELECT Username
      FROM account
      WHERE EXISTS (SELECT * FROM account)";
$r = mysqli_query($dbc, $q);
if (!$r) {
    echo "Select from accounts failed. " . mysqli_error($dbc);
    exit();
}

// If the select isn't empty, check if username is on file.
$row = mysqli_fetch_object($r);
if ($row) {
    $db_userid = $row->Username;

    if ($db_userid != $username) {
        // Add record to accounts table.
        $q = "INSERT INTO account(UserID,Username, Password)
          VALUES('$user_id','$username','$password')";
        $r = mysqli_query($dbc, $q);
        if (!$r) {
            echo "Insert into account failed. " . mysqli_error($dbc);
            exit();
        } else {
            echo "Account successfully created!";
            echo "<a href='index.php'><button type='button'>Return to homepage</button></a>";
        }
    } else {
        echo "This account already exists!";
        echo "<a href='index.php'><button type='button'>Return to homepage</button></a>";
        exit();
    }
} else {
    // If the select is empty, create account
    // Add record to accounts table.
    $q = "INSERT INTO account(UserID,Username, Password)
        VALUES('$user_id','$username','$password')";
    $r = mysqli_query($dbc, $q);
    if (!$r) {
        echo "Insert into account failed. " . mysqli_error($dbc);
        exit();
    } else {
        echo "Account successfully created!";
        echo "<a href='index.php'><button type='button'>Return to homepage</button></a>";
    }
}
?>
