<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $dbc = mysqli_connect("localhost", "bl_user", "TheBoys123!", "blacklistwebsite");
    if (!$dbc) {
        echo "Cannot connect to MySQL. " . mysqli_connect_error();
        exit();
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $q = "SELECT * FROM Account WHERE Username = '$username'AND Password = '$password'";
    $r = mysqli_query($dbc, $q);


      $row =$r->fetch_assoc();

      $q2 = "
      SELECT *
      FROM Account acc, Blackmail bm
      WHERE
      "; 
      $inputPassword = $row['password'];
      if ($inputPassword!=$password){
        echo "Wrong credentials";
        echo "Go back to login page or click link below to create account";
        echo "<a href='create_account.html'>Create Account!</a>";
      }

     ?>
  </body>
</html>
