<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheets/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Palanquin+Dark&display=swap" rel="stylesheet">
    <title>Your Blackmails</title>
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
      $user_id = $row['userID'];
      $q2 = "
      SELECT bm.*
      FROM Account acc, Blackmail bm
      WHERE acc.userID = '$user_id' AND acc.userID = bm.userID;
      ";
      $inputPassword = $row['password'];
      if ($inputPassword!=$password){
        echo "Wrong credentials";
        echo "Go back to login page or click link below to create account";
        echo "<a href='create_account.html'>Create Account!</a>";
      }
      else{
        $r2 = mysqli_query($dbc,$q2);

          echo "<div>";
          while($row2 = $r2->fetch_assoc())
          {
              echo "<div class='img-wrapper'>";
              echo "<b>".$row2['title']."</b>";
              echo   "<img src = ".$row2['image'].">"; //Show image from link
              echo "</div>";

              echo "<div class='demand-wrapper'>";
              echo "<b>Demand(s)</b>";
              echo "<ul>";
              echo  "<li>".$row2['demandList']."</li>";
              echo "</ul>";
              if($row2['isPaid']){
                echo "<b>Paid Off!</b>";
              }
              echo "</div>";
          }
          echo "</div>";

      }
 ?>


  </body>
</html>
