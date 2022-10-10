$(document).ready(function(){
  console.log("b");
  $("#popup").hide();
  $("#productdetails").hide();
  $("#done").hide();
  // $("#savebutton").attr('disabled',true);
  // $("#divlist").show();
  var de=$("#divlist").detach();
  console.log("divllst");
  var need="need";var need1="need1"; var need2="need2"; var need3="need3";var vv1="",vv2="",vv3="",vv4="";var TotalValue="tv";
  $("#popup").hide();
  console.log("HH");
  $("#savebutton").click(function(){
      // console.log(factor);
      var supplier = $("#supplier").val();
      var invoicedate = ($("#invoicedate")).val();
      var invoicenumber = $("#invoicenumber").val();
      if(supplier ==null || invoicedate ==null || invoicenumber==null || (!supplier.trim()==true) || (!invoicedate.trim()==true) || (!invoicenumber.trim()==true))
      {
        alert("Empty fields present. Please Enter all the fields");
        return;
      }
      if(invoicenumber.length>15)
      {
        alert("Maximum character limit exceeded! Invoice Number: 15");
        $("#special").append(de);
        return;
      }
      need=supplier;
      need1=need;
      need2=invoicenumber;
      need3=need2;
      $.ajax({
        method: "post",
        url: "invoicedetails.php",
        data: {
          supplier: supplier,
          invoicedate: invoicedate,
          invoicenumber: invoicenumber
        },
        success: function(response)
        {
          if(response==1)
          {
            alert("No supplier found");
            return;
          }
          else{
             $("#popup").show();
             $("#popup").html(response);
             setTimeout(function() {
                $( "#popup" ).hide();
              }, 2000);
              $("#savebutton").hide();
              $("#productdetails").show();
              $("#supplier").attr('disabled',true);
              $("#invoicedate").attr('disabled',true);
              $("#invoicenumber").attr('disabled',true);
            }
        }

      })

  });
  //FOR THE SUPPLIER DROPDOWN DATALIST---------------------------------------------------------------------------------------------------------------------------------
      $(document).on('dblclick', 'input[list]', function(event){
        event.preventDefault();
            var str = $(this).val();
        $('div[list='+$(this).attr('list')+'] span').each(function(k, obj){
                if($(this).html().toLowerCase().indexOf(str.toLowerCase()) < 0){
                    $(this).hide();
                }
            })
        $('div[list='+$(this).attr('list')+']').toggle(100);
        $(this).focus();
    })

    $(document).on('blur', 'input[list]', function(event){
            event.preventDefault();
            var list = $(this).attr('list');
            setTimeout(function(){
                $('div[list='+list+']').hide(100);
            }, 100);
        })

        $(document).on('click', 'div[list] span', function(event){
            event.preventDefault();
            var list = $(this).parent().attr('list');
            var item = $(this).html();
            $('input[list='+list+']').val(item);
            $('div[list='+list+']').hide(100);
        })

    $(document).on('keyup', 'input[list]', function(event){
            event.preventDefault();
            var list = $(this).attr('list');
        var divList =  $('div[list='+$(this).attr('list')+']');
        if(event.which == 27){ // esc
            $(divList).hide(200);
            $(this).focus();
        }
        else if(event.which == 13){ // enter
            if($('div[list='+list+'] span:visible').length == 1){
                var str = $('div[list='+list+'] span:visible').html();
                $('input[list='+list+']').val(str);
                $('div[list='+list+']').hide(100);
            }
        }
        else if(event.which == 9){ // tab
            $('div[list]').hide();
        }
        else {
            $('div[list='+list+']').show(100);
            var str  = $(this).val();
            $('div[list='+$(this).attr('list')+'] span').each(function(){
              if($(this).html().toLowerCase().indexOf(str.toLowerCase()) < 0){
                $(this).hide(200);
              }
              else {
                $(this).show(200);
              }
            })
          }
        })
//DROP DOWN LIST ENDED----------------------------------------------------------------------------------------------------------------------------------------------------
        $("#addproduct").click(function(){
          console.log("Change");
            var markup = "<tr id='temp'><td id='special'><input type='text' class='inputrow' id='product_name'  name='product_name' list='productlist' autocomplete='off' required></td><td><input type='number' name='quantity' class='inputrow' min='1' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'quantity' style='width:60px;'></td><td><input type='number' min='1' step='0.01' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' name='price' id='price' class='inputrow' style='width:80px;'><td></td></td><td><input type='number' name='sgst' class='inputrow' min='0' step='0.01' value='0' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'sgst' style='width:60px;'></td><td><input type='number' name='cgst' class='inputrow' min='0' step='0.01' value='0' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'cgst' style='width:60px;'></td></tr>";
            $("table tbody").append(markup);
            // var divtag=$("#divlist");
            $("#special").append(de);
            // $("#productlist").show();
            $("#addproduct").attr('disabled',true);
            $("#savebutton1").attr('disabled',false);
        });
        // $("#producttable").on("click", "#savebutton1", function() {
           $("#savebutton1").click(function(){
            //$("#divlist").remove();
            // $("#special").remove($("#divlist"));
            // $("#addproduct").attr('disabled',true);
            console.log("Hello");
            $("#done").show();
            console.log("after done");
            var de=$("#divlist").detach();
            var supplierneed=need1;
            var invoicenumberneed=need3;
            var product_name = $("#product_name").val();
            var quantity = $("#quantity").val();
            // var unit = $("#unit").val();
            var price = $("#price").val();
            var sgst=$("#sgst").val();
            var cgst=$("#cgst").val();
            if(sgst==null)sgst=0;
            if(cgst==null)cgst=0;
            price= parseFloat(price).toFixed(2);
            var amt = price*quantity;
            amt= parseFloat(amt).toFixed(2);
            var amsgst=(sgst/100)*amt;
            var amcgst=(cgst/100)*amt;
            amsgst= parseFloat(amsgst).toFixed(2);
            amcgst= parseFloat(amcgst).toFixed(2);
            var amount=amt+amsgst+amcgst;
            amount= parseFloat(amount).toFixed(2);
            if(product_name ==null || quantity ==null || price==null || (!product_name.trim()==true) || (!quantity.trim()==true) || (!price.trim()==true))
            {
              alert("Nothing to save. Empty fields present");
              $("#special").append(de);
              // $("#addproduct").attr('disabled',false);
              return;
            }
            if(quantity.toString().length>5)
            {
              alert("Maximum character limit exceeded! Quantity: 5");
              $("#special").append(de);
              return;
            }
            // if(price.toString().length>5)
            // {
            //   alert("Maximum character limit exceeded! Quantity: 5");
            //   $("#special").append(de);
            //   return;
            // }

            // var markup = "<tr><td>"+product_name+"</td><td>"+quantity+"</td><td>"+price+"</td><td>"+amount+"</td><td><button class='btn' id='edit'><i class='fa fa-edit'></i>Edit</button></td><td><button class='btn' id='delete'><i class='fa fa-trash'></i>Delete</button></td></tr>";
            // $("table tbody").append(markup);
            // $("table#producttable tr#temp").remove();
            // $("#addproduct").attr('disabled',false);
            $.ajax({
              method: "post",
              url: "productdetails.php",
              data: {
                supplier: supplierneed,
                invoicenumber: invoicenumberneed,
                product_name: product_name,
                quantity: quantity,
                price: price,
                amt: amt,
                sgst: sgst,
                cgst: cgst,
                amsgst: amsgst,
                amcgst: amcgst
              },
              success: function(response){
                if(response==2)
                {
                  alert("No product found");
                  $("#special").append(de);
                  return;
                }
                else{
              var markup = "<tr><td>"+product_name+"</td><td>"+quantity+"</td><td>"+price+"</td><td id='total'>"+amt+"</td><td>"+sgst+"</td><td>"+cgst+"</td><td><button class='btn' id='edit'><i class='fa fa-edit'></i>Edit</button></td><td><button class='btn' id='delete'><i class='fa fa-trash'></i>Delete</button></td></tr>";
              $("table tbody").append(markup);
              $("table#producttable tr#temp").remove();
              // var TotalValue = 0;
              var info=JSON.parse(JSON.stringify(response));
              var amountvar1=info[0].amountvar;
              var amtvar1=info[0].amtvar;
              var amsgstvar1=info[0].amsgstvar;
              var amcgstvar1=info[0].amcgstvar;
              TotalValue=amountvar1;

              $("#coretotal").html("<span style='text-align:center;'>Core Total: &#8377;"+amtvar1+"</span>");
              $("#amsgsttotal").html("<span style='text-align:center;'>SGST: &#8377;"+amsgstvar1+"</span>")
              $("#amcgsttotal").html("<span style='text-align:center;'>CGST: &#8377;"+amcgstvar1+"</span>")
              $("#grandtotal").html("<span style='text-align:center;'>Grand Total: &#8377;"+amountvar1+"</span>")
              // $("tr #total").each(function(index,value){
              //   currentRow = parseFloat($(this).text());
              //   TotalValue += currentRow
              //   $("#amounttotal").html("<span style='text-align:center;'>Core Total: &#8377;"+TotalValue+"</span>");
              // });
              $("#savebutton1").attr('disabled',true);
              $("#addproduct").attr('disabled',false);
              $("#popup").show();
              // $("#popup").html(response);
              // setTimeout(function() {
              //    $( "#popup" ).hide();
              //  }, 2000);
             }
             }
            })
            console.log(TotalValue);
      });

      $("#producttable").on("click", "#delete", function() {

         console.log("delete");
         var currentrow=$(this).closest("tr");
         var data2 = currentrow.find("td:eq(0)");
         var d2=data2.text();
         var inv=need3;
          $.ajax({
            method: "post",
            url: "productdetails_delete.php",
            data: {
              proname: d2,
              inv: need3
            },
            success: function(response){
            $("#popup").show();
            $("#popup").html(response);
            setTimeout(function() {
               $( "#popup" ).hide();
             }, 2000);
           }
          })
          $(this).closest("tr").remove();
      });
      $("#producttable").on("click", "#edit", function() {
        $("#addproduct").attr('disabled',true);
        $("#savebutton1").hide();
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
        var v4=d4;
        vv4=v4;
        console.log(d3);
        console.log(d4);
        // data1.html("<input type='text' value=d1 name='category' class='inputrow' id= 'category' style='width:60px;color:red';>");
        // data2.html("<input type='text' value=d2 name='pid' class='inputrow' id= 'pid' style='width:60px;color:red';>");
        // data3.html("<input type='text' value=d3 name='pname' class='inputrow' id= 'pname' style='width:100px;color:red';>");
        var markup = "<tr id='temp'><td id='special'><input type='text' class='inputrow' id='product_name'  name='product_name' list='productlist' autocomplete='off' style='color:red;' required></td><td><input type='number' min='1' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' name='quantity' class='inputrow' id= 'quantity' style='width:60px;color:red;'></td><td><input type='number' min='1' step='0.01' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' name='price' id='price' class='inputrow' style='width:80px;color:red;'></td><td></td><td><input type='number' name='sgst' class='inputrow' min='0' step='0.01' value='0' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'sgst' style='width:60px;'></td><td><input type='number' name='cgst' class='inputrow' min='0' step='0.01' value='0' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'cgst' style='width:60px;'></td><td><button type='button' class='btn btn-warning' name='Update' id='update'>Update</button></td></tr>";
        $("#save").hide();
        currentrow.replaceWith(markup);
        $("#special").append(de);
        $("#product_name").val(d1);
        $("#quantity").val(d2);
        $("#price").val(d3);
        $("#sgst").val(d5);
        $("#cgst").val(d6);
        var v1=$("#product_name").val();
        var v2=$("#quantity").val();
        var v3=$("#price").val();
        var v5=$("#sgst").val();
        var v6=$("#cgst").val();
        vv1=v1;
        vv2=v2;
        vv3=v3;
        vv5=v5;
        vv6=v6;
        console.log(vv1);
        console.log(vv2);
        console.log(vv3);
        console.log(vv4);
        console.log(vv5);
        console.log(vv6);
    });
    $("#producttable").on("click", "#update", function() {
      $("#addproduct").attr('disabled',true);
      $("#savebutton1").hide();
      var de=$("#divlist").detach();
      var supplierneed=need1;
      var invoicenumberneed=need3;
      var product_name = $("#product_name").val();
      var quantity = $("#quantity").val();
      // var unit = $("#unit").val();
      var price = $("#price").val();
      // var amount = price*quantity;
      var sgst=$("#sgst").val();
      var cgst=$("#cgst").val();
      if(sgst==null)sgst=0;
      if(cgst==null)cgst=0;
      var amt = price*quantity;
      var amsgst=(sgst/100)*amt;
      var amcgst=(sgst/100)*amt;
      var amount=amt+amsgst+amcgst;
      if(product_name ==null || quantity ==null || price==null || (!product_name.trim()==true) || (!quantity.trim()==true) || (!price.trim()==true))
      {
        alert("Nothing to save. Empty fields present");
        $("#special").append(de);
        return;
      }
      if(quantity.toString().length>5)
      {
        alert("Maximum character limit exceeded! Quantity: 5");
        $("#special").append(de);
        return;
      }
      if(price.toString().length>5)
      {
        alert("Maximum character limit exceeded! Quantity: 5");
        $("#special").append(de);
        return;
      }
      // var markup = "<tr><td>"+product_name+"</td><td>"+quantity+"</td><td>"+price+"</td><td>"+amount+"</td><td><button class='btn' id='edit'><i class='fa fa-edit'></i>Edit</button></td><td><button class='btn' id='delete'><i class='fa fa-trash'></i>Delete</button></td></tr>";
      // $("table tbody").append(markup);
      // $("table#producttable tr#temp").remove();
      // $("#addproduct").attr('disabled',false);
      $.ajax({
        method: "post",
        url: "productdetails_update.php",
        data: {
          supplier: supplierneed,
          invoicenumber: invoicenumberneed,
          product_name: product_name,
          quantity: quantity,
          price: price,
          amount: amount,
          sgst: sgst,
          cgst: cgst,
          amsgst: amsgst,
          amcgst: amcgst,
          vv1: vv1,
          vv2: vv2,
          vv3: vv3,
          vv4: vv4,
          vv5: vv5,
          vv6: vv6
        },
        success: function(response){
          if(response==3)
          {
            $("#special").append(de);
            alert("No product found");

            return;
          }
          else{
        var markup = "<tr><td>"+product_name+"</td><td>"+quantity+"</td><td>"+price+"</td><td id='total'>"+amt+"</td><td>"+sgst+"</td><td>"+cgst+"<button class='btn' id='edit'><i class='fa fa-edit'></i>Edit</button></td><td><button class='btn' id='delete'><i class='fa fa-trash'></i>Delete</button></td></tr>";
        $("table tbody").append(markup);
        $("table#producttable tr#temp").remove();
        // $("tr #total").each(function(index,value){
        //   currentRow = parseFloat($(this).text());
        //   TotalValue += currentRow
        //   $("#amounttotal").html("<span style='text-align:center;'>Core Total: &#8377;"+TotalValue+"</span>");
        // });
        $("#addproduct").attr('disabled',false);
        $("#savebutton1").show();
        $("#popup").show();
        $("#popup").html(response);
        setTimeout(function() {
           $( "#popup" ).hide();
         }, 2000);}
       }
      })

  });
    $("#done").click(function(){
      $("#popup").show();
      // $("#popup").html("<strong>All Entries Saved!</strong>");
      // TotalValue=parseFloat(TotalValue);
      console.log(TotalValue);
      var invoicenumberneed=need3;
      $.ajax({
        method: "post",
        url: "totalamount.php",
        data: {
          inv: invoicenumberneed,
          val: TotalValue
        },
        success: function(response)
        {
          $("#popup").html(response);
          setTimeout(function() {
             $( "#popup" ).hide();
           }, 2000);
        }
      })
      window.setTimeout(function() {
      window.location.href = 'inventory.php';
  }, 2000);

  });


});
