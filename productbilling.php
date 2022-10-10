<?php
$barcode=$_POST['barcode'];
$quan=$_POST['quan'];
$cemail=$_POST['cemail'];
$servername="localhost";
$username="root";
$password="";
$database="trinetra";
$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn)
{
  die("Sorry , failed to connect: ".mysqli_connect_error());
}
  $sql="SELECT ProductName,tprice FROM products WHERE PID='$barcode'";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  $name=$row['ProductName'];
  $price=$row['tprice'];
  $rate=$price*$quan;
  $sql2="SELECT sgst,cgst FROM purchase_details WHERE PName='$name' LIMIT 1";
  $result2=mysqli_query($conn,$sql2);
  $row2=mysqli_fetch_assoc($result2);
  $sgst=$row2['sgst'];
  $cgst=$row2['cgst'];
  $persgst=($sgst/100)*$rate;
  $percgst=($cgst/100)*$rate;
  $gtotal=$rate+$persgst+$percgst;
  $json=array(["name"=>$name,"price"=>$price,"sgst"=>$sgst,"cgst"=>$cgst]);
  header('Content-Type: application/json');
  $sql5="INSERT INTO billinginfo(cemail,Product,Qty,Rate,Amount,SGST,CGST,gtotal) VALUES ('$cemail','$name','$quan','$price','$rate','$persgst','$percgst','$gtotal')";
  $result5=mysqli_query($conn,$sql5);
  if(!$result5)echo 'Failed'.mysqli_error($conn);

  echo json_encode($json);


 ?>
