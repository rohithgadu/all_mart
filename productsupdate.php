<?php
  // $sno=$_POST['sno'];
  $category=$_POST['category'];
  $pid=$_POST['pid'];
  $pname=$_POST['pname'];
  $mrp=$_POST['mrp'];
  $tprice=$_POST['tprice'];
  $mql=$_POST['mql'];
  $vv1=$_POST['vv1'];
  $vv2=$_POST['vv2'];
  $vv3=$_POST['vv3'];
  $vv4=$_POST['vv4'];
  $vv5=$_POST['vv5'];
  $vv6=$_POST['vv6'];
  // require ("productsupdateinfo.php");
  // $d1= $a;
  // $d2= $b;
  // $d3= $c;

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
    $sql1="UPDATE products SET Category='$category' WHERE PID='$vv2'";
    $sql3="UPDATE products SET ProductName='$pname' WHERE PID='$vv2'";
    $sql4="UPDATE products SET mrp='$mrp' WHERE PID='$vv2'";
    $sql5="UPDATE products SET tprice='$tprice' WHERE PID='$vv2'";
    $sql6="UPDATE products SET mql='$mql' WHERE PID='$vv2'";
    $sql2="UPDATE products SET PID='$pid' WHERE PID='$vv2'";
    $result1=mysqli_query($conn,$sql1);
    $result3=mysqli_query($conn,$sql3);
    $result2=mysqli_query($conn,$sql2);
    $result4=mysqli_query($conn,$sql4);
    $result5=mysqli_query($conn,$sql5);
    $result6=mysqli_query($conn,$sql6);
    if($result1 && $result2 && $result3 && $result4 && $result5 && $result6)
    {
      echo '<strong>Changes saved! Product Edited!</strong>';
    }
    else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Changes NOT saved!</strong></div>'.mysqli_error($conn);
    }
  }


 ?>
