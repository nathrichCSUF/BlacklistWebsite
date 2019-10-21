<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">

  <title>The Blacklist</title>
  <div class = "user_greeting" id = "userGreeting">

  </div>
    <link rel="stylesheet" href="stylesheets/styles.css">
</head>
<body>
  <h1>THE BLACKLIST</h1>
  <div class="d1">
    <a href="login.html"><button class="b1" type="button">Login</button></a>
    <a href="account.html"><button class="b1" type="button">Create Account</button></a>
  </div>
  <div class="d2">
    <a href="blackmail_view.html"><button class="b2" type="button">View Blackmails</button></a>
    <a href="blackmail_create.html"><button class="b2" type="button">Create a Blackmail</button></a>
  </div>
  <div class="BlackmailList">
    <?php
      $dbc = mysqli_connect("localhost", "bl_user", "TheBoys123!", "blacklistwebsite"); //Connect to db
      if (!$dbc) {
          echo "Cannot connect to MySQL. " . mysqli_connect_error();
          exit();
      }
      $q = "SELECT * FROM Blackmail WHERE isPaid = false;";
      $r = mysqli_query($dbc, $q);
      $j = 0;
      if ($r){ //If results came back
        echo "<div class = 'post-feed'>";
        while($row = $r->fetch_assoc()){ //output data
          echo "<form method='post' action = 'payRansom.php'>";
            echo "<input type='hidden' name='PostId' value = ".$row['PostId']."/>";
            echo   "<img src = ".$row['image'].">"; //Show image from link
            echo "</br><b>".$row['title']."</b></br>";
            echo "<b>Demands</b>";
            echo "<ul>";
            echo  "<li>".$row["demandList"]."</li>";
            echo "</ul>";
            echo "<input type = 'submit'/ value='Pay Ransom'>";
          echo "</form>";

        }
        echo"</div>";
      }
     ?>
  </div>
</html>
