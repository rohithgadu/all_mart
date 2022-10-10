<?php
  $company=$_POST['company'];
  //echo $num;
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
    if($result)
    {
      echo "<div class = 'popp'><h3 class='tttt'>Supplier Details</h3><hr class='hrnew'><p class = 'jst'>Name: </p><p style='display: inline;'>".$row['Name']."</p><p style='display: inline;margin-left:250px;' class = 'jst'>Company: </p><p style='display: inline;'>".$row['Company']."</p><hr><p style='display: inline; ' class = 'jst'>Email: </p><a style='display: inline; color: black; font-style: italic;' href='mailto:".$row['Email']."'>".$row['Email']."</a><div style = ' display: inline;position: fixed; right: 120px'><p style='display: inline-block;' class = 'jst'>Mobile: </p><a style='display: inline;color: black; font-style: italic;' href='tel:".$row['MobileNumber']."'>".$row['MobileNumber']."</a></div><hr><p style='display: inline;' class = 'jst'>GST No: </p><p style='display: inline;'>".$row['GstNo']."</p><hr><p style='display: inline;' class = 'jst'>Address: </p><p style='display: inline;'>".$row['Address']."</p><hr><p style='display: inline;' class = 'jst'>State: </p><p style='display: inline;'>".$row['State']."</p><p style='display: inline;margin-left:300px;' class = 'jst'>City: </p><p style='display: inline;' >".$row['City']."</p></div>";
    }
    else {
      echo mysqli_error($conn);
    }
  }


 ?>
