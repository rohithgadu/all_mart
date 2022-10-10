<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>

     require_once("forgotpw.php");
     echo $randomint;
     if(isset($_POST['submit']))
     {
       if($_POST['otp']==$randomint)
       {
         echo "Verified";
       }
       else {
         echo "Not";
         echo $_POST['otp'];
         echo $randomint;
       }
     }
     else {
       echo "No";
     } -->


    <!-- <form method="post">
      Enter OTP:
      <input type="text" name="otp" value="" placeholder="OTP">
      <input type="submit" name="submit" value="Submit">
    </form> -->

  <!-- </body>
</html> -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      $new=$_POST['pass'];
      $confirmnew=$_POST['confirm'];
      if ($new==$confirmnew)
      {
        $servername="localhost";
        $username="root";
        $password="";
        $database="trinetra";

      $conn=mysqli_connect($servername,$username,$password,$database);
          if (!$conn)
          {
            die("Sorry , failed to connect: ".mysqli_connect_error());
          }
          else
          {
            $sql="UPDATE adminlogin SET Password='$new' WHERE ID='ADM6345128'";
            $result=mysqli_query($conn,$sql);
            // $row=mysqli_fetch_assoc($result);
            if ($result)
            {
            // echo "Login Successful!";
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Password Updated!</strong></div>';
            // sleep(2);
            header("Refresh:1; url=/Supermarket Management System/adminlogin.php");
            //header("Location: /Supermarket Management System/adminlogin.php");
            }
            else {
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops! Password Updation Failed!</strong></div>';
            // echo "<h1>Invalid Credentials.</h1>";
            }

          }
        }

    else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Passwords do not match!</strong></div>';

    }
  }

     ?>
    <!-- <h1>New Page</h1> -->
    <form method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">New Password</label>
        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="pass" required>
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Confirm New Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1"  name="confirm" required>
      </div>
      <button type="submit" class="btn btn-success">Submit</button>
    </form>


  </body>
</html>
