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
    </ul>
  </div>
</div>

  <div class="d2">
    <a href="blackmail_view.html"><button class="b2" type="button">View Your Blackmails</button></a>
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
          echo "<div class='post-feed'<";
          echo "<form method='post' action = 'payRansom.php'>";
          echo "<div class = 'post-feed-wrapper'>";
          echo "<input type='hidden' name='PostId' value = ".$row['PostId']."/>";
          
          echo "<div class='img-wrapper'>";
            echo "<span>".$row['title']."</span>";
            echo   "<img src = ".$row['image'].">"; //Show image from link
            echo "</div>";

            echo "<div class='demand-wrapper'>";
            echo "<span>Demand(s)</span>";
            echo "<ul>";
            echo  "<li>".$row["demandList"]."</li>";
            echo "</ul>";
            echo "</div>";


            echo "<div class='ransom-wrapper'>";
            echo "<input type = 'submit'/ value='Pay Ransom'>";
            echo "</div>";
            
          echo "</form>";
          echo "</div>";

          echo "<div class='post-feed-desc'>Description: ".$row["description"]."</div>";
          echo "</div>";

        }
        echo "</div>";
      }
     ?>
  </div>
</html>
