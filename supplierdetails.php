<?php

$sname=$_POST['sname'];
$company=$_POST['company'];
$semail=$_POST['semail'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$state=$_POST['state'];
$city=$_POST['city'];
$gst=$_POST['gst'];
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
  $sql="INSERT INTO suppliers (Name,Company,Email,MobileNumber,Address,State,City,GstNo) VALUES ('$sname','$company','$semail','$mobile','$address','$state','$city','$gst')";
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
