<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
    <link rel="stylesheet" href="adminhome.css">
    <link rel="stylesheet" href="suppliers_view.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
    hr.hrnew {
    height: 6px;
    border: 0;
    box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);
      }
      .popup .overlay {
        position:fixed;
        top:0px;
        left:0px;
        width:100vw;
        height:100vh;
        background:rgba(0,0,0,0.7);
        z-index:1;
        display:none;
      }

      .popup .content {
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%) scale(0);
        background:#fff;
        width:700px;
        height:430px;
        z-index:2;
        /* text-align:center; */

        padding:20px;
        /* padding-top:30px; */
        box-sizing:border-box;
        font-family:"Open Sans",sans-serif;
      }
      .popup .close-btn {
        cursor:pointer;
        position:absolute;
        right:20px;
        top: 10px;
        top:20px;
        width:30px;
        height:30px;
        background:#222;
        color:#fff;
        font-size:25px;
        font-weight:600;
        line-height:30px;
        text-align:center;
        border-radius:50%;
      }
      .popup.active .overlay {
        display:block;
      }
      .popup.active .content {
        transition:all 300ms ease-in-out;
        transform:translate(-50%,-50%) scale(1);
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
                <a class="nav-link" href="adminhome.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="costing.php">Costing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="inventory.php">Stock Purchase</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="closingstock.php">Closing Stock</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="suppliers.php">Suppliers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_employee.php">Employees</a>
            </li>


        <li class="nav-item"><a href="index.php"><button type="button" name="button" class="btn btn-danger btnn">Log Out</button></li>
      </ul>
    </div>
</nav>
  <div class="popup" id="popup-1">
    <div class="overlay"></div>
    <div class="content" id="cont">
        <div class="close-btn">&times;</div>
      </div>
  </div>
    <div class="bb tt">
        <div class="form-group">
            <label for="usr">Search by:</label>
            <input style="width: 300px; display: inline;" type="text" class="form-control" id="name" placeholder="Name...">
            <input style="width: 300px;display: inline;" type="text" class="form-control" id="comp" placeholder="Company...">
            <a href="add_supplier.php"><button type="button" name="button" class="btn btn-success" id="addnew">Add New Supplier</button></a>
            <button type="button" class="btn btn-secondary">Search</button>
          </div>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="msg"></div>

    <table  class="table table-striped" id="suppliertable">
        <thead>
          <tr>
            <th style="text-align: center;" scope="col">Name</th>
            <th style="text-align: center;" scope="col">Company</th>
            <th style="text-align: center;" scope="col">Phone Number</th>
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
          $sql="SELECT * FROM suppliers";
          $result=mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0)
          {
            while($row=mysqli_fetch_assoc($result))
            {
              echo "<tr><td style='text-align: center;'>".$row['Name']."</td><td style='text-align: center;'>".$row['Company']."</td><td style='text-align: center;'>".$row['MobileNumber']."</td><td style='text-align: center;'><button class='close-btn btn' id='view'><i class='fa fa-eye'></i></button></td><td style='text-align: center;'><button class='btn' id='edit'><i class='fa fa-edit'></i></button></td><td style='text-align: center;'><button class='btn' id='delete'><i class='fa fa-trash'></i></button></td></tr>";
            }
            echo "</tbody>";

          }
          // else {
          //   echo ("0 products avaiable");
          // }
           ?>
        </tbody>
      </table>
    </div>
    <script src="suppliers.js"></script>
    <link rel="stylesheet" href="navv.css">
<script src="navv.js"></script>
</body>
</html>
