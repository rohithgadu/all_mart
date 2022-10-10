<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="adminhome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
    <nav class="navbar navbar-default  navbar-fixed-top navbar-dark bg-dark ">
        <img src="logo.png" alt="" height=50px width=60px><a id="aone" class="navbar-brand">Suppliers</a>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="managerlogin.html"><button type="button" name="button" class="btn btn-danger">Log Out</button></a></li>
        </ul>
    </nav>
    <div id="popup" class="alert alert-success alert-dismissible fade show" role="alert"></div>
    <div class="form-1-container section-container">
        <div class="container">
            <div class="row">
                <div class="col form-1 section-description wow fadeIn">
                    <h2>New Supplier Details</h2>
                    <div class="divider-1 wow fadeInUp"><span></span></div>
                </div>
            </div>
          <!-- <div class="bb tt"> -->
            <div class="row">
                <!-- <div class="col-md-10 offset-md-1 form-1-box wow fadeInUp"> -->

                    <!-- <form method="post"> -->
                        <!-- User's Credentials  -->
                        <!-- <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2">Invoice Details</legend> -->
                            <?php


                             ?>
                            <div class="form-group">
                                <label for="username">Name:<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="sname" placeholder="Supplier Name..." name="sname" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Company:<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="company" name="company" placeholder="Supplier Company..." required>
                            </div>
                            <div class="form-group">
                                <label for="invoice">Mobile Number:<span style="color:red">*</span></label>
                                <input type="invoice" class="form-control" id="mobile" placeholder="Mobile Number..." name="mobile" required>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" class="form-control" id="semail" placeholder="Email..." name="semail">
                            </div>
                            <div class="form-group">
                                <label>Address:</label><br>
                                <textarea name="address" rows="5" cols="40" id="address" placeholder="Company Address"></textarea>
                            </div>
                            <div class="form-group">
                              <label>State: </label>
                              <input type="text" class="form-control" id="state" placeholder="State..." name="state">
                            </div>
                            <div class="form-group">
                              <label>City: </label>
                              <input type="text" class="form-control" id="city" placeholder="City..." name="city">
                            </div>
                            <div class="form-group">
                              <label>GST No.: </label>
                              <input type="text" class="form-control" id="gst" placeholder="GST..." name="gst">
                            </div>
                        <!-- </fieldset> -->
                        <div class="form-group row text-right">
                            <div class="col">
                                <button type="button" class="btn btn-danger" name="savebutton" id="savebutton">Save</button>
                            </div>
                        </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
  <!-- </div> -->
    <script src="dup_add_supplier.js"></script>
</body>
</html>
