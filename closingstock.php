<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="adminhome.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
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
            <li class="nav-item">
                <a class="nav-link" href="inventory.php">Stock Purchase</a>
            </li>
            <li class="nav-item active">
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
    <div class="bb tt">
        <div class="form-group">
            <!-- <button type="button" name="addnew" class="btn btn-success" id="addnew">Add Closing Stock</button> -->
            <!-- <label for="usr">Search by:</label> -->
            <input style="width: 300px; display: inline;" type="text" class="form-control" id="name" placeholder="Product...">
            <button type="button" name="button" class="btn btn-danger">Search</button>
            <button type="button" class="btn btn-secondary">Show All</button>
          </div>
    <table  class="table table-striped" id="stocktable">
        <thead>
          <tr>
            <th style="text-align: center;" scope="col">Name</th>
            <th style="text-align: center;" scope="col">Existing Stock</th>
            <th style="text-align: center;" scope="col">Minimum Quantity Level</th>
            <!-- <th scope="col" style="text-align: center;"> <button type="button" class="btn btn-primary" name="save" id="save">Save</button></th> -->
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
          $sql6="SELECT * FROM closingstock";
          $result8=mysqli_query($conn,$sql6);
          if(mysqli_num_rows($result8)>0)
          {
            while($row=mysqli_fetch_assoc($result8))
            {
              // $name=$row['PName'];
              // $ex=$row['Quantity'];
              // $mql=$row['mql'];
              // $sql3="INSERT INTO closingstock(ProName,existing,mql) VALUES ('$name','$ex','$mql')";
              // mysqli_query($conn,$sql3);
              if($row['existing']<$row['mql'] || $row['existing']==$row['mql'])
              {
                $to_email = "trinetramanager@gmail.com";
                $subject = "Alert! Reminder for filling the inventory.";
                $body = "<p>The stock of <strong>". $row['ProName']."</strong> fell below Minimum Quantity level</p>
                <p>The current existing quantity is: <strong>".$row['existing']."</strong><br>
                  <div>

                    <footer>&copy; Copyright <strong><span>Trinetra</span></strong>. All Rights Reserved</footer>
                  </div>";
                // $header = "Cc: trinetraadm@gmail.com'\r\n";
                $header = "MIME-Version: 1.0\r\n";
                $header.= "Content-type: text/html;charset=iso-8859-1\r\n";
                $header.= "Content-Transfer-Encoding: 7bit\r\n";
                $send=mail($to_email,$subject,$body,$header);
                echo "<tr><td style='text-align: center;'>".$row['ProName']."</td><td style='text-align: center;color:red;'>".$row['existing']."</td><td style='text-align: center;'>".$row['mql']."</tr>";

              }
              else{
              echo "<tr><td style='text-align: center;'>".$row['ProName']."</td><td style='text-align: center;'>".$row['existing']."</td><td style='text-align: center;'>".$row['mql']."</tr>";
            }
            }
            echo "</tbody>";
          }

        // else
        // {
        //   if(mysqli_num_rows($cs)>0)
        //   {
        //     while($row=mysqli_fetch_assoc($cs))
        //     {
        //       // $name=$row['PName'];
        //       // $ex=$row['Quantity'];
        //       // $mql=$row['mql'];
        //       // $sql3="INSERT INTO closingstock(ProName,existing,mql) VALUES ('$name','$ex','$mql')";
        //       // mysqli_query($conn,$sql3);
        //       echo "<tr><td style='text-align: center;'>".$cs['ProName']."</td><td style='text-align: center;'>".$cs['existing']."</td><td style='text-align: center;'>".$cs['mql']."</tr>";
        //     }
        //     echo "</tbody>";
        //   }
        //
        //
        // }
          // else {
          //   echo ("0 products avaiable");
          // }
           ?>

        </tbody>
      </table>
    </div>
    <script src="closingstock.js"></script>
    <link rel="stylesheet" href="navv.css">
<script src="navv.js"></script>
  </body>
  </html>
