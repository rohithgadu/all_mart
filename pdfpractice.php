<?php

// echo $inv.$sname;
// require('productsupdateinfo.php');

// ob_start();
// $inv=$_GET['inv'];
// $sname=$_GET['sname'];
require('fpdf184/fpdf.php');

$servername="localhost";
$username="root";
$password="";
$database="trinetra";
$conn=mysqli_connect($servername,$username,$password,$database);

$pdf = new FPDF();

$pdf->AddPage();
$pdf->Image('logo.png',70,0,30);
$pdf->SetFont('Arial','B',18);
// $pdf->Multicell(200,15,"Supplier Name"."\nSupplier email","",1);
$pdf->SetTextColor(0, 105, 140);
$pdf->Cell(200	,15,'Invoice',0,1,'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial','I',10);
$pdf->Ln();
$pdf->SetFillColor(146, 224, 247);
$pdf->Cell(85,7,'From',1,2,'',1);
$pdf->SetFillColor(255, 255, 255);
$details="SELECT InvoiceNo,SCompany FROM invoicepdf LIMIT 1";
$result5=mysqli_query($conn,$details);
$row1=mysqli_fetch_assoc($result5);
$invoice=$row1['InvoiceNo'];
$company=$row1['SCompany'];
$supplier="SELECT * FROM suppliers WHERE suppliers.Company='$company'";
$result6=mysqli_query($conn,$supplier);
$sinfo=mysqli_fetch_assoc($result6);
$y = $pdf -> GetY();
$pdf->SetFont('Arial','',10);
$pdf->Multicell(85,8,$company."\n".$sinfo['Address']."\n".$sinfo['City'].",\n".$sinfo['State'].".\n(+91)-".$sinfo['MobileNumber']."\n".$sinfo['Email']."\nGST No: ".$sinfo['GstNo'],"LRB",1);
$x = $pdf -> GetX();
$pdf->setXY($x+85,$y-7);
$pdf->Cell(10,15,'',0);
$pdf->SetFillColor(146, 224, 247);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(95,7,'To',1,2,'',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial','',10);
$pdf->Multicell(95,8,"Trinetra Super Market"."\n4-134/135,Hi-Tech City-500081\nHyderabad,\nTelangana"."\nsolutionstrinetra@gmail.com"."\n(+91)-9963483322","LRB",1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$y = $pdf -> GetY();
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(204, 12, 12);
$pdf->Cell(100,7,'Below is the Purchase for Invoice Number '.$invoice,0);
$pdf->SetTextColor(0, 0, 0);
$x = $pdf -> GetX();
$pdf->SetFillColor(245,224,66);
$pdf->setXY($x-100,$y+14);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(185,7,"Products of Invoice",1,2,"L",1);
$pdf->SetFont('Arial','B',10);
$y = $pdf -> GetY();//-----------------------------------------
$pdf->SetFillColor(146, 224, 247);
$pdf->Multicell(60,8,"Product","LRB",'C',1,1);
$x = $pdf -> GetX();
$pdf->setXY($x+60,$y);
$pdf->Multicell(25,8,"Quantity","LRB",'C',1,1);
$pdf->setXY($x+85,$y);
$pdf->Multicell(25,8,"Price","LRB",'C',1,1);
$pdf->setXY($x+110,$y);
$pdf->Multicell(25,8,"SGST","LRB",'C',1,1);
$pdf->setXY($x+135,$y);
$pdf->Multicell(25,8,"CGST","LRB",'C',1,1);
$pdf->setXY($x+160,$y);
$pdf->Multicell(25,8,"Amount","LRB",'C',1,1);
$pdf->SetFillColor(255, 255, 255);//-------------------------
$sql="SELECT Proname,Quan,Pric,Amt,amst,amct,st,ct FROM invoicepdf";
$result=mysqli_query($conn,$sql);
$pdf->SetFont('Arial','',10);
while($row=mysqli_fetch_assoc($result))
{
  $y = $pdf -> GetY();
  $pdf->Multicell(60,8,$row['Proname'],1,'C',1,1);
  $x = $pdf -> GetX();
  $pdf->setXY($x+60,$y);
  $pdf->Multicell(25,8,$row['Quan'],1,'C',1,1);
  $pdf->setXY($x+85,$y);
  $pdf->Multicell(25,8,$row['Pric'],1,'C',1,1);
  $pdf->setXY($x+110,$y);
  $pdf->Multicell(25,8,$row['amst']."   (".$row['st']."%)",1,'C',1,1);
  $pdf->setXY($x+135,$y);
  $pdf->Multicell(25,8,$row['amct']."   (".$row['ct']."%)",1,'C',1,1);
  $pdf->setXY($x+160,$y);
  $pdf->Multicell(25,8,$row['Amt'],1,'C',1,1);

}
$pdf->Ln();
$sql1="SELECT SUM(Amt) AS value_amt FROM purchase_details WHERE purchase_details.InvNo='$invoice'";
$sql2="SELECT SUM(amsgst) AS value_amsgst FROM purchase_details WHERE purchase_details.InvNo='$invoice'";
$sql3="SELECT SUM(amcgst) AS value_amcgst FROM purchase_details WHERE purchase_details.InvNo='$invoice'";
$result1=mysqli_query($conn,$sql1);
$result2=mysqli_query($conn,$sql2);
$result3=mysqli_query($conn,$sql3);
$amt1=(mysqli_fetch_assoc($result1));
$amsgst1=(mysqli_fetch_assoc($result2));
$amcgst1=(mysqli_fetch_assoc($result3));
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
// setlocale(LC_MONETARY,'en_IN.UTF-8');
// $amt=money_format('%n', $amt);
$pdf->SetFont('Arial','',12);
$pdf->Multicell(190,8,"Core total: Rs.".$amt."\nTotal SGST: Rs.".$amsgst."\nTotal CGST: Rs.".$amcgst."\nGrand Total: Rs.".$amount,0,'R',1);
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(190,8,"This is a computer generated copy and hence signature is not required.",0,0,"C");
$sql2="TRUNCATE TABLE invoicepdf";
$result2=mysqli_query($conn,$sql2);
//-------------------------------
$pdf->Output();
// ob_end_flush();
?>
