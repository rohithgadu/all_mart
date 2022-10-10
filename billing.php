<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="billing.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-default  navbar-fixed-top navbar-dark bg-dark ">
        <img src="logo.png" alt="" height=50px width=60px><a id="aone" class="navbar-brand">Billing</a>
        <a id="atrinetra" class="navbar-brand">Trinetra Sales</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php"><button type="button" name="button" class="btn btn-danger">Log Out</button></a></li>
        </ul>
    </nav>
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="trinetra";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if (!$conn)
    {
      die("Sorry , failed to connect: ".mysqli_connect_error());
    }
      $sql="SELECT ProductName FROM products";
      $result=mysqli_query($conn,$sql);
     ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" id='msg'></div>
    <div class="float-container" id="formintro">
      <div class="float-child" id="introform">
        <div class="form-group">
            <p id="pbiller">Biller ID: <span id="billerspan"><b>BL1234</b></span></p>
            <p id="pbill">Invoice Number: <span id="billno"><b>21090001</b></span></p>
            <label>Email: <br></label>
            <input style="width: 300px;display: inline;margin-left:100px" type="text" class="form-control" id="cemail" name ="cemail" placeholder="Email"><br><br>
            <!-- <p><span id='date-time'></span></p> -->
            <label>Address: <br></label>
            <input style="width: 300px;display: inline;" type="text" class="form-control" id="address" name ="comp" placeholder="Address">
        </div>
      </div>
     <div class="float-child" id="introform">
       <div class="form-group">
         <div class="float-container">
           <div class="float-child">
             <label>Product/Bar Code: <br></label>
             <input style="width: 300px;display: inline;" type="text" class="form-control" id="barcode" name ="barcode" placeholder="Code"><br>
             <label>Product Name: <br></label>
             <input style="width: 300px;display: inline;" type="text" class="form-control" id="productname" name ="productname" placeholder="Name" list="pl" autocomplete="off">
             <!-- <div list="pl">
             <?php while($row = mysqli_fetch_array($result)) { ?>
               <span><?php echo $row['ProductName']; ?></span>
               <?php } ?>
             </div> -->
           </div>

           <div class="float-child">
             <form class="form-inline">
               <label>Qty: </label>
                 <input input style="width: 75px;display: inline;" type="text" class="form-control" id="quan" name ="comp" placeholder="Qty" value=1>
               <!-- <label>Rate:</label>
                 <input input style="width: 100px;display: inline;" type="text" class="form-control" id="rate" name ="comp" placeholder="Rate"> -->
             </form><br>
             <button type="button" name="addbtn" class="btn btn-danger" id="addbtn">Add</button>

           </div>

         </div>

       </div>
      </div>
    </div>

    <div class="float-container">
      <div class="float-child" style="height:350px;width:700px;border:1px solid #ccc;font:16px/26px;overflow:auto;">
        <table  class="table table-striped " id="billtable">
            <thead>
              <tr>
                <th style="text-align: center;" scope="col">Product</th>
                <th style="text-align: center;" scope="col">Qty</th>
                <th style="text-align: center;" scope="col">Rate</th>
                <th style="text-align: center;" scope="col">Amount</th>
                <th style="text-align: center;" scope="col">SGST</th>
                <th style="text-align: center;" scope="col">CGST</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
     <div class="float-child" id="transaction">
       <div class="float-container">
         <div class="float-child" id="billamount">
             <p id="tamt"></p>
             <p id="sgst"></p>
             <p id="cgst"></p>
             <p id="disc"></p>
             <p id="pay"></p>
             <button type="button" name="generate" class="btn btn-success" id="generate">Generate E-bill</button>
             <!-- <button type="button" name="button" class="btn btn-warning" id="buttonhold">Hold</button> -->
          </div>
          <div class="float-child" id="modes">
            <p>Payment Mode:</p><br>
            <button type="button" name="paymentmode" class="btn btn-primary" style="border-width:10px;">Cash</button>
            <button type="button" name="paymentmode" class="btn btn-primary" disabled>Card</button>
            <button type="button" name="paymentmode" class="btn btn-primary" disabled>UPI</button>
            <input type="text" class="center" placeholder="Cash given by Customer" id="cashgiven"/>
            <button type="button" name="button" class="btn btn-secondary">Enter</button><br>
            <p id="change">Change to be given: <span id="changeamt"> 196.00</span></p>
          </div>
      </div>
    </div>
    <div id="result"></div>
    <div id="pd"></div>
    <p id="oneid"></p>
    <p id="twoid"></p>
    <p id="threeid"></p>
    <script src="billing.js"></script>
  </body>
  </html>
