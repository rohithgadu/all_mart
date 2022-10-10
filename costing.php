<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="adminhome.css">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>




  <nav class="navbar navbar-expand-custom navbar-mainbg">
    <img src="logo.png" alt="" height=80px width=100px>
    <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
            <li class="nav-item ">
                <a class="nav-link" href="adminhome.php">Home</a>
            </li>
            <li class="nav-item">

                <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="costing.php">Costing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="inventory.php">Stock Purchase</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="closingstock.php">Closing Stock</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="suppliers.php">Suppliers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Employees</a>
            </li>

        
        <li class="nav-item"><button type="button" name="button" class="btn btn-danger btnn">Log Out</button></li>
      </ul>
    </div>
</nav>












    <!-- <nav class="navbar navbar-default  navbar-fixed-top navbar-dark bg-dark ">
        <img src="logo.png" alt="" height=50px width=60px><a id="aone" class="navbar-brand">Costing</a>
        <a href="products.html" class="navbar-brand" id="atwo"><img src="products.png" alt="" width="35" height="30" class="d-inline-block align-text-top"> Products</a>
        <a href="inventory.html" class="navbar-brand" id="atwo"><img src="inventory.png" alt="" width="35" height="30" class="d-inline-block align-text-top"> Inventory</a>
        <a href="suppliers.html" class="navbar-brand" id="atwo"><img src="supplier.png" alt="" width="35" height="30" class="d-inline-block align-text-top"> Suppliers</a>
        <a href="employees.html" class="navbar-brand" id="atwo"><img src="employees.png" alt="" width="35" height="30" class="d-inline-block align-text-top"> Employees</a>
        <a href="costing.html" class="navbar-brand" id="atwo"><img src="costing.png" alt="" width="35" height="30" class="d-inline-block align-text-top"> Costing</a>
        <a href="crm.html" class="navbar-brand" id="atwo"><img src="crm.png" alt="" width="35" height="30" class="d-inline-block align-text-top"> CRM</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="adminlogin.html"><button type="button" name="button" class="btn btn-danger" onclick="adminhome.html">Log Out</button></a></li>
        </ul>
    </nav> -->
    <div class="bb tt">
        <div class="form-group">
            <!-- <label for="usr">Search by:</label> -->
            <input style="width: 300px; display: inline;" type="text" class="form-control" id="name" placeholder="Product...">
            <input style="width: 300px;display: inline;" type="text" class="form-control" id="comp" placeholder="Category...">
            <button type="button" name="button" class="btn btn-danger">Search</button>
            <button type="button" class="btn btn-secondary">Show All</button>
            <div id='totalprofit' style="display:inline-block;float:right;margin-right:20px"></div>
          </div>
    <table  class="table table-striped">
        <thead>
          <tr>
            <th style="text-align: center;" scope="col">Product</th>
            <th style="text-align: center;" scope="col">Category</th>
            <th style="text-align: center;" scope="col">Cost Price</th>
            <th style="text-align: center;" scope="col">TPrice</th>
            <th style="text-align: center;" scope="col">Profit(per item)</th>
            <!-- <th style="text-align: center;" scope="col">MRP</th> -->
            <th style="text-align: center;" scope="col">Selling Quantity</th>
            <th style="text-align: center;" scope="col">Profit(&#8377;)</th>
            <th style="text-align: center;" scope="col">Profit(%)</th>
          </tr>
        </thead>
        <tbody>
          <?php

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
          // $sql="SELECT PName,Quantity,mql FROM purchase_details INNER JOIN products ON purchase_details.PName=products.ProductName";
          // $result=mysqli_query($conn,$sql);
          $sql6="SELECT PName,Quantity,Price,Amt,amsgst,amcgst,Category,mrp,tprice,sgst,cgst FROM purchase_details INNER JOIN products ON purchase_details.PName=products.ProductName";
          $result8=mysqli_query($conn,$sql6);
          if(mysqli_num_rows($result8)>0)
          {
            while($row=mysqli_fetch_assoc($result8))
            {
              $name=$row['PName'];
              $sql19="SELECT existing FROM closingstock WHERE closingstock.ProName='$name'";
              $result10=mysqli_query($conn,$sql19);
              $row81=mysqli_fetch_assoc($result10);
              $ex=$row81['existing'];
              $quan=$row['Quantity'];
              $sellquan=$quan-$ex;
              $price=$row['Price'];
              $amt=$row['Amt'];
              $amsgst=$row['amsgst'];
              $amcgst=$row['amcgst'];
              // $purchase=(($amt+$amsgst+$amcgst)/($quan))*$sellquan;
              $purchase=$row['Price'];
              $tprice=$row['tprice'];
              $selling=$tprice-$purchase;
              $pp=($selling/$purchase)*100;
              $pp=round($pp,2);
              // $pp=$pp.number_format($pp2);
              // $sgstp=$row['sgst'];
              // $cgstp=$row['cgst'];
              $profit=($selling)*$sellquan;
              // $percgst=($amcgst/$quan)*$sellquan;
              // $selling=($tprice*$sellquan)
              // $profit=(($selling-$purchase)/$selling)*100;

              // $mql=$row['mql'];
              // $sql3="INSERT INTO closingstock(ProName,existing,mql) VALUES ('$name','$ex','$mql')";
              // mysqli_query($conn,$sql3);
              echo "<tr><td style='text-align: center;'>".$name."</td><td style='text-align: center;'>".$row['Category']."</td><td style='text-align: center;'>&#8377;".$purchase."</td><td style='text-align: center;'>&#8377;".$row['tprice']."</td><td style='text-align: center;'>&#8377;".$selling."</td><td style='text-align: center;'>".$sellquan."</td><td id='profittotal' style='text-align: center;color:green;font-weight:bold'>".$profit."</td><td style='text-align: center;'>".$pp."</tr>";
            }
            echo "</tbody>";
          }
           ?>
           <script>
           var TotalValue=0; var b=0;
           $("tr #profittotal").each(function(index,value){
             currentRow = parseFloat($(this).text());
             TotalValue += currentRow;
             console.log(TotalValue);
             b=parseFloat(b);
             b=TotalValue.toFixed(2);
             console.log(jQuery.type(b));
             $("#totalprofit").html("<span style='text-align:center;font-weight:bold;font-size:20px;background-color:#adff2f;padding:10px;border-radius:5px;'>Net Total Profit: &#8377;"+b+"</span>");
           });
           </script>

        </tbody>
      </table>
    </div>
<link rel="stylesheet" href="navv.css">
<script src="navv.js"></script>
  </body>
  </html>
