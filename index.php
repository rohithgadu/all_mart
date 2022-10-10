<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All in One Mart - A finest Supermarket Management Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="prac.css">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

</head>
<body>
    <header>
    <div class="wrapper">
        <div class="logo">
            <img src="logo_trinetra.png" alt="" id="" height="100" width="100">
        </div>
<ul class="nav-area">
<li><a href="billerlogin.php">Billing</a></li>
<li><a href="managerlogin.php">Manager</a></li>
<li><a href="adminlogin.php">Admin</a></li>
<li><a href="#about">About</a></li>
<li><a href="#contact">Contact Us</a></li>
</ul>
</div>
<div class="welcome-text">
        <h1>
All in One <span>SuperMarket</span></h1>
<a href="#contact">Contact</a>
    </div>
</header>
<!-- About us section -->
<section id="about" class="about">
    <div class="container">


      <div class="section-title">
        <h1 style="font-size:400%">About Us</h1>
      </div>


      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1" ><br>
          <h4><b>This is a large retail market that sells food and other household goods and that is usually operated on a self-service basis. any business or company offering an unusually wide range of goods or services: a financial supermarket that sells stocks, bonds, insurance, and real estate.” <br><span style="font-size: large;">~ Admin</span></b></h4><br>
          <p class="font-italic">

          </p>

          <p style="font-size: 120%;">
            All in One Mart is a youth-based supermarket working towards a better and egalitarian society.
<br><br>
In the early days of retailing, products generally were fetched by an assistant from shelves behind the merchant's counter while customers waited in front of the counter and indicated the items they wanted. Most foods and merchandise did not come in individually wrapped consumer-sized packages, so an assistant had to measure out and wrap the precise amount desired by the consumer.
          </p>
        </div>


        <div class="col-lg-6 order-1 order-lg-2 " >
          <center>
          <img src="super1.png" style="padding-top: 20%;padding-bottom: 20%;padding-left: 50px;" class="img-fluid justify-content-center"  alt="" height="600" width="600">
        </center>
        </div>


      </div>

    </div>
  </section>

 <!-- ======= Contact Us Section ======= -->
 <section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Contact Us</h2>
        <p> Let's join hands and work towards a better society.</p>
      </div>

      <div class="row">

        <div class="col-lg-4 col-md-6">
          <div class="contact-about">
            <h3 style="color:#360d46">ALL IN ONE MART</h3>
            <p> Our initial store format is a full-fledged supermarket  that allows you to find all the products you need to keep your home running smoothly for the month ahead.</p>
            <div class="social-links">
              <a href="#" class=""><i class="icofont-twitter"></i></a>
              <a href="#" class=""><i class="icofont-facebook"></i></a>
              <a href="#" class=""><i class="icofont-instagram"></i></a>
              <a href="#" class=""><i class="icofont-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info">
            <div>
              <i class="icofont-google-map"></i>
              <p>Vellore Institute of Technology <br>Vellore 632014, Tamil Nadu <br>India</p>
            </div>

            <div>
              <a href="mailto:fepsi@vit.ac.in"> <i class="icofont-envelope"></i></a>
              <p>allinonemart@gmail.com</p>
            </div>

            <div>
              <a href="tel:+919999999999"> <i class="icofont-phone"></i></a>
              <p>9999999999</p>
            </div>

          </div>
        </div>

        <div class="col-lg-5 col-md-12">




<form action="" method="POST" class="php-email-form">
<div class="form-group">
  <input type="email" class="form-control" name="_replyto" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
  <div class="validate"></div>
</div>
 <div class="form-group">
    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
    <div class="validate"></div>
  </div>

<!-- your other form fields go here -->

<div class="mb-3">
    <div class="text-center">
    <button type="submit" onclick="reply()" >Send Message</button>
</div>

</form>
<script>
function reply(){
  alert("Thankyou for your response!!");
}
</script>
<hr>
        </div>
      </div>
    </div>
 </section>

<!-- footer -->

<footer id="footer">
    <div class="end">

      <div class="credits">
        <div class=" tt">
            &copy; Copyright <strong><span>All in one Mart</span></strong>. All Rights Reserved
          </div>
      </div>
    </div>
  </footer>
  <a href="#" class="back-to-top"><i class="icofont-simple-up">he</i></a>
  <button onclick="topFunction()" id="myBtn" title="Go to top"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
  </svg></button>
<script>
    //Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
</body>
</html>
