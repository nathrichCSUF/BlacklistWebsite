<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <title>Search Bar</title>
  </head>
  <body>



    <?php

    $dbc = mysqli_connect("localhost", "bl_user", "TheBoys123!", "blacklistwebsite");
    if (!$dbc) {
        echo "Cannot connect to MySQL. " . mysqli_connect_error();
        exit();
    }

    if(isset($_POST['search'])){
      $searchTitle = $_POST['search'];
      $q = "SELECT bm.*
      FROM  Blackmail bm
      WHERE bm.title = '$searchTitle';
      ";

      $r = mysqli_query($dbc, $q);
      $count = mysqli_num_rows($r); //count how many outputs

      if($count == 0) {
        echo "There is no matched result.";
        echo "<a href='search_bar.html'>Enter TiTle!</a>";
      }
      else {
        while($row = $r->fetch_assoc()){
          echo "<div class='post-feed'>";
          echo "<div class='post-feed-wrapper'>";
          echo "<div class='img-wrapper'>";
          echo "<span>".$row['title']."</span>";
          echo   "<img src = ".$row['image'].">"; //Show image from link
          echo "</div>"; //end img-wrapper

          echo "<div class='demand-wrapper'>";
          echo "<span>Demand(s)</span>";
          echo "<ul>";
          echo  "<li>".$row['demandList']."</li>";
          echo "</ul>";
          echo "</div>"; //end demand-wrapper
          echo "</div>"; //end post-feed-wrapper
        }
        echo "</div>";
      }

    }

     ?>

  </body>
</html>
