<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
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
        echo "Wrong credentials";
        echo "Go back to login page or click link below to create account";
        echo "<a href='create_account.html'>Create Account!</a>";
      }
      else{

        $userIDRow = $row['userID'];

        echo "
        <form method='post' action='post_blackmail.php'>";
        echo "<input type='hidden' name = 'userID' value='$userIDRow'
        <label for='t1'>Title</label>
        <input class='t1' type='text' name='title' value='' required>

        <label for='t2'>Demands</label>
        <input class='t2' type='text' name='demands' value='' required>

        <label for='t3'>Description</label>
        <input class='t3' type='text' name='description' value=''>

        <label for='t4'>Upload an image</label>
        <input class='t4' type='text' name='imageURL' accept='.jpg, .jpeg, .png' >

        <input type='submit' name='' value='Submit'>
      </form>
      ";

    }

   ?>



</body>

</html>
