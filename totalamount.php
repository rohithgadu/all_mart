<?php

$val=$_POST['val'];
$inv=$_POST['inv'];

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
  $sql="INSERT INTO totalamount(Inv,Total) VALUES ('$inv','$val')";
  $result=mysqli_query($conn,$sql);
  $sql1099="SELECT PName,Quantity,mql FROM purchase_details INNER JOIN products ON purchase_details.PName=products.ProductName";
  $result1099=mysqli_query($conn,$sql1099);
  if(mysqli_num_rows($result1099)>0)
  {
    while($row=mysqli_fetch_assoc($result1099))
    {
      $name=$row['PName'];
      $ex=$row['Quantity'];
      $mql=$row['mql'];
      $sql3="INSERT INTO closingstock(ProName,existing,mql) VALUES ('$name','$ex','$mql')";
      mysqli_query($conn,$sql3);
      // echo "<tr><td style='text-align: center;'>".$row['PName']."</td><td style='text-align: center;'>".$row['Quantity']."</td><td style='text-align: center;'>".$row['mql']."</tr>";
    }
    // echo "</tbody>";
  }
  if($result)
  {
    echo '<strong> Purchase Saved! </strong>';
  }
  else {
    echo 'Sorry'.mysqli_error($conn);
  }

 ?>
