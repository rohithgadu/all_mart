<?php
$a=4;
$inv=$_POST['inv'];
$sname=$_POST['sname'];
$gtotal=$_POST['gtotal'];

$servername="localhost";
$username="root";
$password="";
$database="trinetra";
$conn=mysqli_connect($servername,$username,$password,$database);
if (!$conn)
{
  die("Sorry , failed to connect: ".mysqli_connect_error());
}
$sql1="SELECT * FROM purchase_details WHERE purchase_details.InvNo='$inv'";
$result1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_assoc($result1))
{
  $d1=$row['Supplier'];
  $d2=$row['PName'];
  $d3=$row['Quantity'];
  $d4=$row['Price'];
  $d5=$row['Amt'];
  $d6=$row['sgst'];
  $d7=$row['cgst'];
  $d8=$row['amsgst'];
  $d9=$row['amcgst'];
  $sql2="INSERT INTO invoicepdf(InvoiceNo,SCompany,Proname,Quan,Pric,Amt,st,ct,amst,amct) VALUES ('$inv','$d1','$d2','$d3','$d4','$d5','$d6','$d7','$d8','$d9')";
  $result2=mysqli_query($conn,$sql2);
  if($result2)echo'done';
  else echo mysqli_error($conn);
}
// $sql3="SELECT * FROM suppliers WHERE suppliers.Company='$sname'";
// $result3=mysqli_query($conn,$sql3);if($result3)echo 'result3';else echo mysqli_error($conn);
// echo 'rows'.mysqli_num_rows($result3);
// while($row=mysqli_fetch_assoc($result3))
// {
//   $d1=$row['Name'];
//   $d2=$row['Email'];
//   $d3=$row['MobileNumber'];
//   $d4=$row['Address'];
//   $d5=$row['State'];
//   $d6=$row['City'];
//   $d7=$row['GstNo'];
//   $sql4="INSERT INTO invoicepdf(SName,SEmail,SMob,SAdd,Sstate,Scity,gstnum) VALUES ('$d1','$d2','$d3','$d4','$d5','$d6','$d7')";
//   $result4=mysqli_query($conn,$sql4);
//   if($result4)echo'secondhalf';
//   else echo mysqli_error($conn);
// }
echo 'Received'.$inv.$gtotal.$sname;
// require("pdfpractice.php");
// ,Proname,Quan,Price,Amt,st,ct,amst,amct
// ,"$row['PName']","$row['Quantity']","$row['Price']","$row[Amt]","$row['sgst']","$row['cgst']","$row['amsgst']","$row['amcgst']"
 ?>
