console.log("suppliers.js");
$(document).ready(function(){
  $("#msg").hide();
  $(".close-btn").click(function(){
     document.getElementById("popup-1").classList.toggle("active");
    });
    document.addEventListener('keydown', function(event){
  	if(event.key === "Escape"){
  document.getElementById("popup-1").classList.toggle("active");
  	}
  });
  $("#suppliertable").on("click", "#delete", function() {
      var currentrow=$(this).closest("tr");
      var data2 = currentrow.find("td:eq(1)");
      var d2=data2.text();
      $.ajax({
        method: "post",
        url: "supplier_delete.php",
        data: {
          company:d2
        },
        success: function(response)
        {
          $("#msg").show();
          $("#msg").html(response);
          setTimeout(function() {
             $("#msg").hide();
           }, 1000);
        }
      })
      $(this).closest("tr").remove();
    });
    $("#suppliertable").on("click", "#view", function() {
        console.log("Hello");
        var currentrow=$(this).closest("tr");
        var data2 = currentrow.find("td:eq(1)");
        var d2=data2.text();
        $.ajax({
          method: "post",
          url: "supplier_view.php",
          data: {
            company:d2
          },
          success: function(response)
          {
            $("#cont").html(response);
          }
        })
      });
      $("#suppliertable").on("click", "#edit", function() {
          var currentrow=$(this).closest("tr");
          var data2 = currentrow.find("td:eq(1)");
          var d2=data2.text();
          $.ajax({
            method: "post",
            url: "supplier_edit.php",
            data: {
              company:d2
            },
            success: function(response)
            {
              $("#msg").show();
              $("#msg").html(response);
              setTimeout(function() {
                 $("#msg").hide();
               }, 1000);
            }
          })
          // $(this).closest("tr").remove();

           // window.location.replace("add_supplier.php");
        });

});
