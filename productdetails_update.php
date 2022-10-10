<?php
$supplier=$_POST['supplier'];
$invoicenumber=$_POST['invoicenumber'];
$product_name=$_POST['product_name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$amount=$_POST['amount'];
$vv1=$_POST['vv1'];
$vv2=$_POST['vv2'];
$vv3=$_POST['vv3'];
$vv4=$_POST['vv4'];

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
$sql1="UPDATE purchase_details SET Name='$product_name' WHERE InvNo='$invoicenumber' AND Name='$vv1'";
$sql3="UPDATE purchase_details SET Quantity='$quantity' WHERE InvNo='$invoicenumber' AND Quantity='$vv2'";
$sql2="UPDATE purchase_details SET Price='$price' WHERE InvNo='$invoicenumber' AND Price='$vv3'";
$sql4="UPDATE purchase_details SET Amount='$amount' WHERE InvNo='$invoicenumber' AND Amount='$vv4'";
$result1=mysqli_query($conn,$sql1);
$result3=mysqli_query($conn,$sql3);
$result2=mysqli_query($conn,$sql2);
$result4=mysqli_query($conn,$sql4);

if($result1 && $result2 && $result3 && $result4)
{
  echo '<strong>Changes saved! Product Edited!</strong>';
}
else {
  $var=3;
  echo $var;
}
 ?>
