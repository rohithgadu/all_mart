<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="adminhome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <li class="nav-item ">
                <a class="nav-link" href="costing.php">Costing</a>
            </li>
            <li class="nav-item active">
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
    <div id="popup" class="alert alert-success alert-dismissible fade show" role="alert"></div>
    <div class="bb tt">
        <div class="form-group">
            <a href="add_purchase.php"><button type="button" name="button" class="btn btn-success" id="addnew">Add New Purchase</button></a>
            <input style="width: 300px; display: inline;" type="text" class="form-control" id="name" placeholder="Supplier...">
            <input style="width: 300px;display: inline;" type="text" class="form-control" id="comp" placeholder="Invoice Number...">
            <label for="date">From Date: <br>
            <input type="date" name="date" id="date" style="width: 300px;display: inline;" class="form-control" >
            </label>
            <label for="date">To Date: <br>
            <input type="date" name="date" id="date" style="width: 300px;display: inline;" class="form-control">
            </label>
            <br><button type="button" name="button" class="btn btn-danger">Search</button>
          </div>

    <table  class="table table-striped" id="inventorytable">
        <thead>
          <tr>
            <th style="text-align: center;" scope="col">Supplier</th>
            <th style="text-align: center;" scope="col">Invoice Number</th>
            <th style="text-align: center;" scope="col">Total Amount</th>
            <th style="text-align: center;" scope="col">Invoice Date</th>
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
          $sql="SELECT * FROM invoice_details INNER JOIN totalamount ON invoice_details.InvoiceNumber=totalamount.Inv";
          $result=mysqli_query($conn,$sql);
          // $rowinv=mysqli_fetch_assoc($result1);
          // $sql2="SELECT * FROM totalamount"
          // $result2=mysqli_query($conn,$sql2);
          if(mysqli_num_rows($result)>0)
          {
            while($row=mysqli_fetch_assoc($result))
            {
              echo "<tr><td style='text-align: center;'>".$row['Supplier']."</td><td style='text-align: center;'>".$row['InvoiceNumber']."</td><td style='text-align: center;'>&#8377;".$row['Total']."</td><td style='text-align: center;'>".$row['InvoiceDate']."</td><td style='text-align: center;'><button class='btn' id='view'><i class='fa fa-eye'></i></button></td><td style='text-align: center;'><button class='btn' id='edit'><i class='fa fa-edit'></i></button></td><td style='text-align: center;'><button class='btn' id='delete'><i class='fa fa-trash'></i></button></td></tr>";
            }
            echo "</tbody>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- <footer id="footer">
        <div class="end">

          <div class="credits">
            <div class=" tt">
                &copy; Copyright <strong><span>Trinetra</span></strong>. All Rights Reserved
              </div>
          </div>
        </div>
    </footer> -->
    <script src="inventory.js"></script>
    <link rel="stylesheet" href="navv.css">
<script src="navv.js"></script>
</body>
</html>
