<?php
  // $sno=$_POST['sno'];
  $category=$_POST['category'];
  $pid=$_POST['pid'];
  $pname=$_POST['pname'];
  $mql=$_POST['mql'];
  $ex=$_POST['ex'];
  $idate=$_POST['idate'];

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
    $sql="INSERT INTO closingstock (Productid,ProName,ProCategory,existing,msq,invdate) VALUES ('$pid','$name','$category','$existing','$mql','$idate')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      echo '<strong>Changes saved! Product Added!</strong>';
    }
    else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Changes NOT saved!</strong></div>'.mysqli_error($conn);
    }
  }


 ?>
