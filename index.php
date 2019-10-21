<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">

  <title>The Blacklist</title>
  <div class = "user_greeting" id = "userGreeting">

  </div>
    <link rel="stylesheet" href="stylesheets/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Palanquin+Dark&display=swap" rel="stylesheet">
</head>
<body>

<div class="navlist-container">
<div class="navlist-wrapper">
    <h1 class="home-title">THE BLACKLIST</h1>
    <ul class="navlist">

      <li>
      <a href="create_account.html"><button class="b1" type="button">Create Account</button></a>
      </li>
      <!-- <li>
      <a href="login.html"><button class="b1" type="button">Login</button></a>
      </li> -->
    </ul>
  </div>
</div>

  <!-- <h1 class="home-title">THE BLACKLIST</h1>
  <div class="d1">
    <a href="login.html"><button class="b1" type="button">Login</button></a>
    <a href="login.html"><button class="b1" type="button">Login</button></a>
  </div> -->
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
        echo "<div class = 'post-wrapper'>";
        while($row = $r->fetch_assoc()){ //output data
          echo "<div class = 'post-feed'>";
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
          echo "</div>";

        }
        echo"</div>";
      }
     ?>
  </div>
</html>
