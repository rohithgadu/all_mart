<?php

$proname=$_POST['proname'];
$invoicenumber=$_POST['inv'];

// echo 'Got it'.$supplier.$product_name.$quantity.$price.$amount;
$servername="localhost";
$username="root";
$password="";
$database="trinetra";
$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn)
{
  die("Sorry , failed to connect: ".mysqli_connect_error());
}
  $sql="DELETE FROM purchase_details WHERE purchase_details.InvNo='$invoicenumber' AND purchase_details.Name='$proname'";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    echo '<strong> Deleted! </strong>';
  }
  else {
    echo 'Sorry'.mysqli_error($conn);
  }

 ?>
