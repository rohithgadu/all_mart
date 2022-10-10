<?php
  $category=$_POST['category'];
  $pid=$_POST['pid'];
  $pname=$_POST['pname'];
  $servername="localhost";
  $username="root";
  $password="";
  $database="trinetra";
  $x=0;
  $y=0;
  $z=0;
  //Create a connection
  $conn=mysqli_connect($servername,$username,$password,$database);
  if (!$conn)
  {
    die("Sorry , failed to connect: ".mysqli_connect_error());
  }

  if(empty($category)){$x=1;}
  if(empty($pid)){$y=1;}
  if(empty($pname)){$z=1;}
  if($x==1)//Category is Empty
  {
    if($y==1)//ID is EMPTY
    {
      $sql="SELECT * FROM products WHERE products.ProductName='$pname'";
    }
    else if($z==1)//Name is Empty
    {
      $sql="SELECT * FROM products WHERE products.PID='$pid'";
    }
    else if($y==0 && $z==0)//Both presenet
    {
      $sql="SELECT * FROM products WHERE products.PID='$pid'";

    }

  }
  else if($y==1)//Category is Empty
  {
    if($x==1)//ID is EMPTY
    {
      $sql="SELECT * FROM products WHERE products.ProductName='$pname'";
    }
    else if($z==1)//Name is Empty
    {
      $sql="SELECT * FROM products WHERE products.Category='$category'";
    }
    else if($z==0 && $x==0)//Both presenet
    {
      $sql="SELECT * FROM products WHERE products.ProductName='$pname' AND products.Category='$category'";

    }

  }
  else if($z==1)//Category is Empty
  {
    if($y==1)//ID is EMPTY
    {
      $sql="SELECT * FROM products WHERE products.Category='$category'";
    }
    else if($x==1)//Name is Empty
    {
      $sql="SELECT * FROM products WHERE products.PID='$pid'";
    }
    else if($y==0 && $x==0)//Both presenet
    {
      $sql="SELECT * FROM products WHERE products.PID='$pid'";

    }

  }
  else {
    $sql="SELECT * FROM products WHERE products.PID ='$pid'";
  }

    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
      while($row=mysqli_fetch_assoc($result))
      {
        echo "<tr><td style='text-align: center;'>".$row['Category']."</td><td style='text-align: center;'>".$row['PID']."</td><td style='text-align: center;'>".$row['ProductName']."</td><td style='text-align: center;'>".$row['mrp']."</td><td style='text-align: center;'>.".$row['tprice']."</td><td style='text-align: center;'><button class='btn' id='edit'><i class='fa fa-edit'></i></button></td><td style='text-align: center;'><button class='btn' id='delete'><i class='fa fa-trash'></i></button></td></tr>";
      }
      echo "</tbody>";

    }
    // else {
    //   echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    // <strong>Changes NOT saved!</strong></div>'.mysqli_error($conn);
    // }



 ?>
