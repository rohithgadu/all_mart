<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <?php
       $company=$_POST['company'];
       //echo $num;
       // $a=100;
       $servername="localhost";
       $username="root";
       $password="";
       $database="trinetra";
       //Create a connection
       $conn=mysqli_connect($servername,$username,$password,$database);
       if (!$conn)
       {
         die("Sorry , failed to connect: ".mysqli_connect_error());
       }
       else
       {
         $sql="SELECT * FROM suppliers WHERE suppliers.Company = '$company'";
         $result=mysqli_query($conn,$sql);
         $row=mysqli_fetch_assoc($result);
         $sname=$row['Name'];
         $company=$row['Company'];
         $semail=$row['Email'];
         $mobile=$row['MobileNumber'];
         $address=$row['Address'];
         $state=$row['State'];
         $city=$row['City'];
         $gst=$row['GstNo'];
         if($result)
         {
           echo "<strong>".$company."</strong>";
         }
         else {
           echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Changes NOT saved!</strong></div>'.mysqli_error($conn);
         }

       }
      ?>
    <script src="add_supplier.js"></script>
   </body>
 </html>
