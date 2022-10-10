<?php
$supplier=$_POST['supplier'];
$invoicenumber=$_POST['invoicenumber'];
$product_name=$_POST['product_name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$amt=$_POST['amt'];
$sgst=$_POST['sgst'];
$cgst=$_POST['cgst'];
$amsgst=$_POST['amsgst'];
$amcgst=$_POST['amcgst'];

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
  $sql="INSERT INTO purchase_details(InvNo,Supplier,PName,Quantity,Price,Amt,sgst,cgst,amsgst,amcgst) VALUES ('$invoicenumber','$supplier','$product_name','$quantity','$price','$amt','$sgst','$cgst','$amsgst','$amcgst')";
  $result=mysqli_query($conn,$sql);
  // $sql1099="SELECT PName,Quantity,mql FROM purchase_details INNER JOIN products ON purchase_details.PName=products.ProductName";
  // $result1099=mysqli_query($conn,$sql1099);
  // if(mysqli_num_rows($result1099)>0)
  // {
  //   while($row=mysqli_fetch_assoc($result1099))
  //   {
  //     $name=$row['PName'];
  //     $ex=$row['Quantity'];
  //     $mql=$row['mql'];
  //     $sql3="INSERT INTO closingstock(ProName,existing,mql) VALUES ('$name','$ex','$mql')";
  //     mysqli_query($conn,$sql3);
  //     // echo "<tr><td style='text-align: center;'>".$row['PName']."</td><td style='text-align: center;'>".$row['Quantity']."</td><td style='text-align: center;'>".$row['mql']."</tr>";
  //   }
  //   // echo "</tbody>";
  // }
  $sql1="SELECT SUM(Amt) AS value_amt FROM purchase_details WHERE purchase_details.InvNo='$invoicenumber'";
  $sql2="SELECT SUM(amsgst) AS value_amsgst FROM purchase_details WHERE purchase_details.InvNo='$invoicenumber'";
  $sql3="SELECT SUM(amcgst) AS value_amcgst FROM purchase_details WHERE purchase_details.InvNo='$invoicenumber'";
  $result1=mysqli_query($conn,$sql1);
  $result2=mysqli_query($conn,$sql2);
  $result3=mysqli_query($conn,$sql3);
  $amt1=(mysqli_fetch_assoc($result1));
  $amsgst1=(mysqli_fetch_assoc($result2));
  $amcgst1=(mysqli_fetch_assoc($result3));
  if($result && $result1 && $result2 && $result3)
  {
    $amt=$amt1['value_amt'];
    $amsgst=$amsgst1['value_amsgst'];
    $amcgst=$amcgst1['value_amcgst'];
    round($amt);
    round($amsgst);
    round($amcgst);
    $amount=$amt+$amsgst+$amcgst;
    round($amount);
    $amt=number_format($amt,2);
    $amsgst=number_format($amsgst,2);
    $amcgst=number_format($amcgst,2);
    $amount=number_format($amount,2);

    $json=array(["amtvar"=>$amt,"amsgstvar"=>$amsgst,"amcgstvar"=>$amcgst,"amountvar"=>$amount]);
    header('Content-Type: application/json');
    echo json_encode($json);
    // "amtvar"=>$amt,"amsgstvar"=>$amsgst,"amcgstvar"=>$amcgst,

    // echo '<strong> Added! </strong>';
  }
  else {
    $var=2;
    echo $var;
  }
 ?>
