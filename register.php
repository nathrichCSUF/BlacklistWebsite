<?php

// Connect to the BlacklsitWebsite database.
$dbc = mysqli_connect("localhost", "root", "", "blacklistwebsite");
if (!$dbc) {
    echo "Cannot connect to MySQL. " . mysqli_connect_error();
    exit();
}

mysqli_set_charset($dbc, 'utf8');

// Take user input from create_account.html and insert into accounts table.
$username = $_POST['username'];
$password = $_POST['password'];

// Select all usernames from accounts table
$q = "SELECT Username
      FROM accounts
      WHERE EXISTS (SELECT * FROM accounts)";
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
        $q = "INSERT INTO accounts(Username, Password)
          VALUES('$username','$password')";
        $r = mysqli_query($dbc, $q);
        if (!$r) {
            echo "Insert into account failed. " . mysqli_error($dbc);
            exit();
        } else {
            echo "Account successfully created!";
        }
    } else {
        echo "This account already exists!";
        exit();
    }
} else {
    // If the select is empty, create account
    // Add record to accounts table.
    $q = "INSERT INTO accounts(Username, Password)
        VALUES('$username','$password')";
    $r = mysqli_query($dbc, $q);
    if (!$r) {
        echo "Insert into account failed. " . mysqli_error($dbc);
        exit();
    } else {
        echo "Account successfully created!";
    }
}
?>
