<?php
  // $sno=$_POST['sno'];
  $category=$_POST['category'];
  $pid=$_POST['pid'];
  $pname=$_POST['pname'];
  $mrp=$_POST['mrp'];
  $tprice=$_POST['tprice'];
  $mql=$_POST['mql'];
  round($mrp);
  $mrp=number_format($mrp,2);
  $tprice=$_POST['tprice'];
  round($tprice);
  $tprice=number_format($tprice,2);

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
    $sql="INSERT INTO products (Category,PID,ProductName,mrp,tprice,mql) VALUES ('$category','$pid','$pname','$mrp','$tprice','$mql')";
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
