<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
  <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>OTP Sent to email! Enter OTP to change the password.</strong></div>; -->

  <?php
  // header("Set-Cookie: cross-site-cookie=whatever; SameSite=None; Secure");
  // echo "IN php<br>";
  $to_email = "trinetraadm@gmail.com";
  $subject = "One Time Password";
  //global $randomint;
  $randomint=mt_rand(1000,9999);
  $var=$randomint;
  $body = "<p>One Time Password is: <strong>$randomint</strong></p>
    <div>
      <footer>&copy; Copyright <strong><span>Trinetra</span></strong>. All Rights Reserved</footer>
    </div>";
  $header = "MIME-Version: 1.0\r\n";
  $header.= "Content-type: text/html;charset=iso-8859-1\r\n";
  $header.= "Content-Transfer-Encoding: 7bit\r\n";
  $send=mail($to_email,$subject,$body,$header);
  if($send)
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>OTP Sent to email! Enter OTP to change the password.</strong></div>';
    //exit();
  }
  else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! Sending OTP Failed!</strong></div>';
  }
  //echo $randomint;
  // if($_SERVER['REQUEST_METHOD'] == 'POST')
  // {
  //   echo $var;
  //   $otp=$_POST['otp'];
  //   if($otp==$var)
  //   {
  //     echo "Verified";
  //     header("Location: /Supermarket Management System/adminhome.html");
  //     exit();
  //   }
  //   else {
  //     echo "Not ".$otp;
  //     // echo $_POST['otp'];
  //     // echo $randomint;
  //   }
  // }
  // else {
  //   echo "No";
  // }
   ?>
   <form method="post" action="#">
     Enter OTP:
     <input type="text" name="otp" value="" placeholder="OTP" class="form-control">
     <button type="button" name="button" class="btn btn-primary">Sumbit</button>
   </form>
    <h3 id="tone"></h3>


    <!-- // require("forgotpw.php");
    // $randomint=mt_rand(1000,9999);
    echo $randomint;
    if(isset($_POST['submit']))
    {
      if($_POST['otp']=="1234")
      {
        echo "Verified";
      }
      else {
        echo "Not";
        // echo $_POST['otp'];
        // echo $randomint;
      }
    }
    else {
      echo "No";
    } -->

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript">
  $('button').click(function() {
    var x=$("input").val();
    var randomint='<?php echo $randomint; ?>';
    console.log(randomint);
    $("h3").html(x);
    if(randomint==x)
    {
      var ver="Verified";
      $("h3").html(ver);
      window.location = "http://localhost/Supermarket%20Management%20System/pwchange.php";
    }
    else {
      var ver="Incorrect OTP";
      $("h3").html(ver);
    }

  })
  </script>

  </body>
</html>
