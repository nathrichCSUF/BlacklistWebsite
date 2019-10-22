<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylesheets/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Palanquin+Dark&display=swap" rel="stylesheet">

  <title>Create a Blackmail</title>
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
      $inputPassword = $row['password'];
      if ($inputPassword!=$password){
	echo "<div class='create-wrapper'>";
	echo "<h1>Wrong credentials</h1>";
	echo "<div class='create-container'>";
        echo "<h2>Go back to login page or click link below to create account</h2>";
	echo "<a href='create_account.html'><button type='button'>Create Account!</button></a>";
	echo "</div>";
	echo "</div>";
      }
      else{
        $userIDRow = $row['userID'];
        echo "<div class='create-wrapper'>";
        echo "<form method='post' action='post_blackmail.php'>";
        echo "<h1>Create your Blackmail</h1>";
        echo "<div class='create-container'>";
        echo "<input type='hidden' name = 'userID' value='$userIDRow'
        <label for='t1'>Title</label>
        <input class='t1' type='text' name='title' value='' required>

        <label for='t2'>Demands</label>
        <input class='t2' type='text' name='demands' value='' required>

        <label for='t3'>Description</label>
        <input class='t3' type='text' name='description' value='' required>

        <label for='t4'>Image URL</label>
        <input class='t4' type='url' name='imageURL' accept='.jpg, .jpeg, .png' required>

        <input type='submit' name='' value='Submit'>
      </form>
      ";
      echo "</div>";
      echo "</div>";

    }

   ?>



</body>

</html>
