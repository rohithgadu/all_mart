$(document).ready(function(){
  console.log("inventorytretb.js");
  $( "#popup" ).hide();
  $("#inventorytable").on("click", "#view", function() {
     console.log("view");
     var currentrow=$(this).closest("tr");
     var data1 = currentrow.find("td:eq(0)");
     var data2 = currentrow.find("td:eq(1)");
     var data3= currentrow.find("td:eq(2)");
     var d1=data1.text();
     var d2=data2.text();
     var d3=(data3.text());
     console.log(d1,d2,d3);
     // var inv=need3;
      $.ajax({
        method: "post",
        url: "productsupdateinfo.php",
        data: {
          sname: d1,
          inv: d2,
          gtotal: d3
        },
        success: function(response){
        $("#popup").show();
        $("#popup").html(response);
        setTimeout(function() {
           $( "#popup" ).hide();
         }, 2000);
         window.open('pdfpractice.php','_blank');
       }
      })
  });
  $("#inventorytable").on("click", "#delete", function() {

     console.log("delete");
     var currentrow=$(this).closest("tr");
     var data2 = currentrow.find("td:eq(1)");
     var d2=data2.text();
     // var inv=need3;
      $.ajax({
        method: "post",
        url: "inventorytable_delete.php",
        data: {
          inv: d2,
          // inv: need3
        },
        success: function(response){
        $("#popup").show();
        $("#popup").html(response);
        setTimeout(function() {
           $( "#popup" ).hide();
         }, 2000);
       }
      })
      // $(this).closest("tr").remove();
  });

  });
