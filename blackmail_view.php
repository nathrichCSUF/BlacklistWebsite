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
        echo "<div class='create-wrapper'>";
        echo "<h1>Wrong credentials</h1>";
        echo "<h2>Go back to login page or click link below to create account</h2>";
        echo "<div class='create-container'>";
        echo "<a href='blackmail_view.html'><button type='button'>Return to Login</button></a>";
        echo "<a href='create_account.html'><button type='button'>Create Account!</button></a>";
        echo "</div>";
        echo "</div>";
      }
      else{
        $r2 = mysqli_query($dbc,$q2);
          echo "<div class='create-container'>";
          echo "<a href='index.php'><button type='button'>Return to homepage</button></a>";
          echo "</div>";
          echo "<div class='post-wrapper'>";
          while($row2 = $r2->fetch_assoc())
          {
              echo "<div class='post-feed'>";
              echo "<div class='post-feed-wrapper'>";
              echo "<div class='img-wrapper'>";
              echo "<span>".$row2['title']."</span>";
              echo   "<img src = ".$row2['image'].">"; //Show image from link
              echo "</div>"; //end img-wrapper

              echo "<div class='demand-wrapper'>";
              echo "<span>Demand(s)</span>";
              echo "<ul>";
              echo  "<li>".$row2['demandList']."</li>";
              echo "</ul>";
              echo "</div>"; //end demand-wrapper
              echo "</div>"; //end post-feed-wrapper
              if($row2['isPaid']){
                echo "<span class='paid'>Paid Off!</span>";
              }
              echo "</div>"; //end post-feed
          }
          echo "</div>"; //end post-wrapper

      }
 ?>


  </body>
</html>
