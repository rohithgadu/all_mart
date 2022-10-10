<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="adminhome.css">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
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
                <li class="nav-item">
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
                <li class="nav-item active">
                    <a class="nav-link" href="add_employee.php">Employees</a>
                </li>


            <li class="nav-item"><a href="index.php"><button type="button" name="button" class="btn btn-danger btnn">Log Out</button></a></li>
          </ul>
        </div>
    </nav>
    <div class="form-1-container section-container">
        <div class="container">
            <div class="row">
                <div class="col form-1 section-description wow fadeIn">
                    <h2 style="text-align:center;margin:15px;">Employee Details</h2>
                    <div class="divider-1 wow fadeInUp"><span></span></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 form-1-box wow fadeInUp">

                    <form action="" method="post">
                        <!-- User's Credentials  -->
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2">Personal Details</legend>
                            <div class="form-group">
                                <label for="username">First Name:</label>
                                <input type="text" class="form-control" id="supplier" placeholder="First Name..." name="supplier">
                                <label for="username">Last Name:</label>
                                <input type="text" class="form-control" id="supplier" placeholder="Last Name..." name="supplier">
                            </div>
                            <div class="form-group">
                                <label for="date">Date of birth: </label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender">
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                  <option value="Others">Others</option>


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="GST">Address:</label>
                                <textarea class="form-control" id="taform" rows="3"></textarea>
                            </div>

                        </fieldset>
                        <!-- User's Preferences  -->
                        <fieldset class="form-group border p-3">
                            <legend class="w-auto px-2">Professional Information</legend>
                            <div class="form-group">
                                <label for="emailid">Email Id:</label>
                                <input type="text" class="form-control" id="emailid" placeholder="example@gmail.com" name="emailid">
                                <label for="phonenu">Phone Number (For Official Purpose):</label>
                                <input type="text" class="form-control" id="supplier" placeholder="(+91)" name="phonenu">
                                <label for="gender">Designation:</label>
                                <select class="form-control" name="gender">
                                  <option value="Male">Manager</option>
                                  <option value="Female">Biller</option>
                                  <option value="Others">SubStaff</option>
                                  <option value="Others">Security</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="gender">Address Proof:</label>
                              <select class="form-control" name="gender">
                                <option value="Male">Aadhar Card</option>
                                <option value="Female">Driving License</option>
                                <option value="Others">Voter ID</option>
                                <option value="Others">Electricity Bill</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="emailid">Unique Identification Number:</label><input type="text" class="form-control" id="emailid" placeholder="Aadhar/PAN/License/Voter ID" name="emailid">

                            </div>
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile02">
                                  <label class="custom-file-label" for="inputGroupFile02">Choose file (Address Proof)</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text" id="">Upload</span>
                                </div>
                              </div>
                        </fieldset>
                        <!-- Submit Button  -->

                        <div class="form-group row text-right">
                            <div class="col">
                                <button type="submit" class="btn btn-danger">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="navv.css">
    <script src="navv.js"></script>
</body>
</html>
