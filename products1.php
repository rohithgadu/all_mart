<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="adminhome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    .inputrow
    {
      border-left: none;
      border-right: none;
      border-top: none;
      background-color: transparent;
      resize: none;
      outline: none;
      text-align: center;
      color: blue;
    }
    td{
      text-align: center;
    }
    </style>

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
                <a class="nav-link" href="managerhome.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="products.php">Products</a>
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



        <li class="nav-item"><a href="index.php"><button type="button" name="button" class="btn btn-danger btnn">Log Out</button></a></li>
      </ul>
    </div>
</nav>
    <div class="bb tt">
        <div class="form-group">
            <label for="usr">Search by:</label>
            <input style="width: 300px; display: inline;" type="text" class="form-control" id="searchcat" placeholder="Category...">
            <input style="width: 300px;display: inline;" type="text" class="form-control" id="searchid" placeholder="ID...">
            <input style="width: 300px;display: inline;" type="text" class="form-control" id="searchname" placeholder="Name...">
            <button type="button" name="button" class="btn btn-success" id="addnew">Add New Product</button>
            <button type="button" class="btn btn-secondary" name="search" id="search" disabled>Search</button>
          </div>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id='msg'></div>
    <table  class="table table-striped" id="producttable">
        <thead>
          <tr>
            <th style="text-align: center;" scope="col">Category</th>
            <th style="text-align: center;" scope="col">Product ID</th>
            <th style="text-align: center;" scope="col">Product Name</th>
            <th style="text-align: center;" scope="col">MRP</th>
            <th style="text-align: center;" scope="col">TPrice</th>
            <th style="text-align: center;" scope="col">Minimum Stock Level</th>
            <th scope="col" style="text-align: center;"> <button type="button" class="btn btn-primary" name="save" id="save">Save</button> </th>
            <th scope="col" style="text-align: center;"></th>
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
          $sql="SELECT * FROM products";
          $result=mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0)
          {
            while($row=mysqli_fetch_assoc($result))
            {
              echo "<tr><td style='text-align: center;'>".$row['Category']."</td><td style='text-align: center;'>".$row['PID']."</td><td style='text-align: center;'>".$row['ProductName']."</td><td style='text-align: center;'>".$row['mrp']."</td><td style='text-align: center;'>".$row['tprice']."</td><td style='text-align: center;'>".$row['mql']."</td><td style='text-align: center;'><button class='btn' id='edit'><i class='fa fa-edit'></i>Edit</button></td><td style='text-align: center;'><button class='btn' id='delete'><i class='fa fa-trash'></i>Delete</button></td></tr>";
            }
            echo "</tbody>";
          }

           ?>
        </tbody>
      </table>
    </div>
    <script src="products.js"></script>
    <link rel="stylesheet" href="navv.css">
<script src="navv.js"></script>
  </body>
</html>
