<?php

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
  $sql="DELETE FROM purchase_details WHERE purchase_details.InvNo='$invoicenumber'";
  $result=mysqli_query($conn,$sql);
  $sql2="DELETE FROM totalamount WHERE totalamount.Inv='$invoicenumber'";
  $result2=mysqli_query($conn,$sql2);
  $sql1="DELETE FROM invoice_details WHERE invoice_details.InvoiceNumber='$invoicenumber'";
  $result1=mysqli_query($conn,$sql1);
  if($result && $result1 && $result2)
  {
    echo '<strong> Deleted! </strong>';
  }
  else {
    echo 'Sorry'.mysqli_error($conn);
  }

 ?>
