<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biller Login</title>
    <link rel="stylesheet" href="login.css">
    <!-- <link rel="stylesheet" href="rough.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $id=$_POST['eid'];
    $pw=$_POST['pwd'];
    $servername="localhost";
    $username="root";
    $password="";
    $database="trinetra";
    //Create a connection
    $conn=mysqli_connect($servername,$username,$password,$database);
    if (!$conn)
    {
      die("Sorry , failed to connect: ".mysqli_connect_error());
    }
    else
    {
      $sql="SELECT Password FROM billinglogin WHERE eid='$id'";
      $result=mysqli_query($conn,$sql);
      if (mysqli_num_rows($result)==0){              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Invalid Employee ID!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>';}
      else{
      $row=mysqli_fetch_assoc($result);
      if ($pw==$row['Password'])
      {
      // echo "Login Successful!";
      header("Location:/supermarket_-main/billing.php");
      }
      else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Incorrect Password!</strong></div>';
      // echo "<h1>Invalid Credentials.</h1>";
      }
    }
  }

      // require("C:\Users\Aditya Nutulapati\Desktop\SuperMarket Management System\adminlogin.php");

    }





   ?>
    <div class="wrapper fadeInDown">
        <div id="formContent">

          <div class="fadeIn first">
            <img src="logo.png" id="icon" alt="User Icon"/>
          </div><br>
          <small style="color:#56baed"><i>Biller</i></small>
          <form method="post">
            <input type="text" id="eid" class="fadeIn second" name="eid" placeholder="Employee ID" required>
            <input type="password" id="pwd" class="fadeIn third" name="pwd" placeholder="Password" required>
            <input type="submit" class="fadeIn fourth" value="Log In">
          </form>


        </div>
      </div>
      <footer id="footer">
        <div class="end">

          <div class="credits">
            <div class=" tt">
                &copy; Copyright <strong><span>Trinetra</span></strong>. All Rights Reserved
              </div>
          </div>
        </div>
      </footer>

</body>
</html>
