console.log("c");
$(document).ready(function(){
        $("#searchid").keyup(function(){
          if(this.value.trim()!="")
            {
              $("#searchcat").attr('disabled',true);
              $("#searchname").attr('disabled',true);
              $("#search").attr('disabled',false);
            }
            else {
              $("#searchcat").attr('disabled',false);
              $("#searchname").attr('disabled',false);
              // if($("$searchcat").value.trim()!="") $("#search").attr('disabled',false);
              // else if($("$searchname").value.trim()!="")$("#search").attr('disabled',false);
            }
        });
        $("#searchcat").keyup(function(){
          if(this.value.trim()!="")
            {
              $("#search").attr('disabled',false);
            }
          else {
              $("#searchid").attr('disabled',true);
          }
        });
        $("#searchname").keyup(function(){
          if(this.value.trim()!="")
            {
              $("#search").attr('disabled',false);
            }
            else {
                $("#searchid").attr('disabled',true);
            }
        });
        var factor=5;var vv1="",vv2="",vv3="",vv4=0,vv5=0,vv6=0;
        $("#addnew").click(function(){
            var markup = "<tr id='temp'><td><input type='text' name='category' class='inputrow' id= 'category' style='width:60px;'></td><td><input type='text' name='pid'  id='pid' class='inputrow' style='width:60px;'></td><td><input type='text' name='pname' id='pname' class='inputrow' style='width:100px;'></td><td><input type='number' name='mrp' class='inputrow' min='1' step='0.01' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'mrp' style='width:60px;'></td><td><input type='number' name='tprice' class='inputrow' min='1' step= '0.01' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'tprice' style='width:60px;'></td><td><input type='number' name='mql' class='inputrow' min='1' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'mql' style='width:60px;'></td></tr>";
            $("table tbody").append(markup);
            $("#addnew").attr('disabled',true);
            console.log(factor);
        });
        $("#producttable").on("click", "#save", function() {
           factor=6;
            console.log(factor);
            var category = $("#category").val();
            var pid = $("#pid").val();
            var pname = $("#pname").val();
            var mrp=$("#mrp").val();
            var tprice=$("#tprice").val();
            var mql=$("#mql").val();
            var markup = "<tr><td>"+ category +"</td><td>" + pid + "</td><td>" + pname + "</td><td>" + mrp +"</td><td>" +tprice+"</td><td>" +mql+"</td><td><button class='btn' id='edit'><i class='fa fa-edit'></i>Edit</button></td><td><button class='btn' id='delete'><i class='fa fa-trash'></i>Delete</button></td></tr>";
            if(category ==null || pid ==null || pname==null || mrp==null || tprice==null || mql==null || (!category.trim()==true) || (!pid.trim()==true) || (!pname.trim()==true) || (!mrp.trim()==true)|| (!tprice.trim()==true))
            {
              alert("Nothing to save. Empty fields present");
              return;
            }
            // console.log(!category.trim());
            $("table tbody").append(markup);
            $("table#producttable tr#temp").remove();
            $("#addnew").attr('disabled',false);
            console.log(tprice);
            $.ajax({
              method: "post",
              url: "productsbackend.php",
              data: {
                category: category,
                pid: pid,
                pname: pname,
                mrp: mrp,
                tprice: tprice,
                mql: mql
              },
              success: function(response)
              {
                $("#msg").html(response);
              }

            })
      });
      $("#producttable").on("click", "#delete", function() {

          console.log(factor);
          var currentrow=$(this).closest("tr");
          var data2 = currentrow.find("td:eq(1)");
          var d2=data2.text();
          $.ajax({
            method: "post",
            url: "products_delete.php",
            data: {
              pid:d2
            },
            success: function(response)
            {
              $("#msg").html(response);
            }
          })
          $(this).closest("tr").remove();
    });
        $("#producttable").on("click", "#edit", function() {

          $("#addnew").attr('disabled',true);
          var currentrow=$(this).closest("tr");
          var data1 = currentrow.find("td:eq(0)");
          var data2 = currentrow.find("td:eq(1)");
          var data3 = currentrow.find("td:eq(2)");
          var data4 = currentrow.find("td:eq(3)");
          var data5 = currentrow.find("td:eq(4)");
          var data6 = currentrow.find("td:eq(5)");
          var d1=data1.text();
          var d2=data2.text();
          var d3=data3.text();
          var d4=data4.text();
          var d5=data5.text();
          var d6=data6.text();
          var dd4=parseFloat(d4);
          var dd5=parseFloat(d5);
          var dd6=parseFloat(dd6);
          console.log(dd4);
          console.log(dd5);
          // data1.html("<input type='text' value=d1 name='category' class='inputrow' id= 'category' style='width:60px;color:red';>");
          // data2.html("<input type='text' value=d2 name='pid' class='inputrow' id= 'pid' style='width:60px;color:red';>");
          // data3.html("<input type='text' value=d3 name='pname' class='inputrow' id= 'pname' style='width:100px;color:red';>");
          var markup = "<tr id='temp'><td><input type='text' name='category' class='inputrow' id= 'category' style='width:60px;color:red;'></td><td><input type='text' name='pid'  id='pid' class='inputrow' style='width:60px;color:red;'></td><td><input type='text'  name='pname' id='pname' class='inputrow' style='width:100px;color:red;'></td><td><input type='number' name='mrp' class='inputrow' min='1' step= '0.01' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'mrp' style='width:60px;'></td><td><input type='number' name='tprice' class='inputrow' min='1' step= '0.01' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'tprice' style='width:60px;'><td><input type='number' name='mql' class='inputrow' min='1' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'mql' style='width:60px;'></td><td><button type='button' class='btn btn-warning' name='Update' id='update'>Update</button></td></tr>";
          $("#save").hide();
          currentrow.replaceWith(markup);
          $("#category").val(d1);
          $("#pid").val(d2);
          $("#pname").val(d3);
          $("#mrp").val(d4);
          $("#tprice").val(d5);
          $("#mql").val(d6);
          var v1=$("#category").val();
          var v2=$("#pid").val();
          var v3=$("#pname").val();
          var v4=$("#mrp").val();
          var v5=$("#tprice").val();
          var v6=$("#mql").val();
          vv1=v1;
          vv2=v2;
          vv3=v3;
          vv4=v4;
          vv5=v5;
          vv6=v6;

          console.log(vv1);
          console.log(vv2);
          console.log(vv3);
          console.log(vv4,vv5,vv6);
      });
      $("#producttable").on("click", "#update", function() {
          factor=2;
          console.log(factor);
          var category = $("#category").val();
          var pid = $("#pid").val();
          var pname = $("#pname").val();
          var mrp=$("#mrp").val();
          var tprice=$("#tprice").val();
          var mql=$("#mql").val();
          var markup = "<tr><td>"+category+"</td><td>" + pid + "</td><td>" + pname + "</td><td>" + mrp +"</td><td>" +tprice+"</td><td>"+mql+"</td><td><button class='btn' id='edit'><i class='fa fa-edit'></i>Edit</button></td><td><button class='btn' id='delete'><i class='fa fa-trash'></i>Delete</button></td></tr>";
          if(category ==null || pid ==null || pname==null || mrp==null || tprice==null || mql==null || (!category.trim()==true) || (!pid.trim()==true) || (!pname.trim()==true) || (!mrp.trim()==true)|| (!tprice.trim()==true))
          {
            alert("Empty fields present");
            return;
          }
          // console.log(!category.trim());
          $("table tbody").append(markup);
          $("table#producttable tr#temp").remove();
          $("#addnew").attr('disabled',false);
          $.ajax({
            method: "post",
            url: "productsupdate.php",
            data: {
              category: category,
              pid: pid,
              pname: pname,
              mrp: mrp,
              tprice: tprice,
              mql: mql,
              vv1: vv1,
              vv2: vv2,
              vv3: vv3,
              vv4: vv4,
              vv5: vv5,
              vv6: vv6
            },
            success: function(response)
            {
              $("#msg").html(response);
            }

          })
          console.log(vv1);
          console.log(vv2);
          console.log(vv3);
          $("#save").show();

    });
    // $("#search").keyup(function(){
    //   if(pid.trim()!="")
    //   {
    //     $("#searchcat").attr('disabled',true);
    //     $("#searchname").attr('disabled',true);
    //   }
    //   else {
    //     $("#searchcat").attr('disabled',false);
    //     $("#searchname").attr('disabled',false);
    //   }
    // });
    $("#search").click(function(){
      var category = $("#searchcat").val();
      var pid = $("#searchid").val();
      var pname = $("#searchname").val();
      if(category ==null && pid ==null && pname==null)
      {
        alert("Empty fields present.");
        return;
      }
       // $(this).keyup(function(){
       //   if(pid.trim()!="")
       //   {
       //     $("#searchcat").attr('disabled',true);
       //     $("#searchname").attr('disabled',true);
       //   }
       //   else {
       //     $("#searchcat").attr('disabled',false);
       //     $("#searchname").attr('disabled',false);
       //   }
       // });

      $.ajax({
        method: "post",
        url: "displaybackend.php",
        data: {
          category: category,
          pid: pid,
          pname: pname
        },
        success: function(response)
        {
          $("#producttable tbody").html(response);
        }

      })


    });
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
  }
  });
