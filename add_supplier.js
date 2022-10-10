console.log("end");
console.log("add_supplier.js");
var jsvar="<?=$sname?>";
console.log(jsvar);
$(document).ready(function(){
  $("#popup").hide();


  $("#savebutton").click(function(){
    var sname= $("#sname").val();
    var company = ($("#company")).val();
    var mobile=$("#mobile").val();
    var semail = $("#semail").val();
    var address= $("#address").val();
    var state = ($("#state")).val();
    var city=$("#city").val();
    var gst = $("#gst").val();
    $.ajax({
      method: "post",
      url: "supplierdetails.php",
      data: {
        sname: sname,
        company: company,
        mobile: mobile,
        semail: semail,
        address: address,
        state: state,
        city: city ,
        gst: gst
      },
      success: function(response)
      {
           $("#popup").show();
           $("#popup").html(response);
           setTimeout(function() {
              $( "#popup" ).hide();
            }, 2000);
      }

    })
        setTimeout(function(){
       window.location.replace("suppliers.php");
    }, 2500)
  });
});
