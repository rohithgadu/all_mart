<?php
$supplier=$_POST['supplier'];
$invoicedate=$_POST['invoicedate'];
$invoicenumber=$_POST['invoicenumber'];
$servername="localhost";
$username="root";
$password="";
$database="trinetra";
$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn)
{
  die("Sorry , failed to connect: ".mysqli_connect_error());
}
  $sql="INSERT INTO invoice_details (Supplier,InvoiceDate,InvoiceNumber) VALUES ('$supplier','$invoicedate','$invoicenumber')";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    echo '<strong>Changes saved! Product Added!</strong>';
  }
  else {
    $var=1;
    echo $var;
  }



 ?>
