<?php
  $company=$_POST['company'];
  //echo $num;
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
    $sql="DELETE FROM suppliers WHERE suppliers.Company = '$company'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      echo '<strong>Changes saved! Product Deleted</strong>';
    }
    else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Changes NOT saved!</strong></div>'.mysqli_error($conn);
    }
  }


 ?>
