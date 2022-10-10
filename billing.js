console.log("k");
// barcode.addEventListener('input', inputHandler);
$(document).ready(function(){
  var tv=0;var b=0;var tmp=0;
  $("#barcode").attr('disabled',true);
  $("#pd").hide();
  $("#oneid").hide();
  $("#twoid").hide();
  $("#threeid").hide();
  $("#barcode").on("input", function(){
        // Print entered value in a div box
        $("#pd").text($(this).val());
        var a=  $("#pd").text();
        console.log(a);
        if(a.length==13){$("#addbtn").click();$("#barcode").val("");}

  });
  $("#cemail").keyup(function(){
    if(this.value.trim()!="")
      {
        $("#barcode").attr('disabled',false);
      }
      else {
        $("#barcode").attr('disabled',true);
        // if($("$searchcat").value.trim()!="") $("#search").attr('disabled',false);
        // else if($("$searchname").value.trim()!="")$("#search").attr('disabled',false);
      }
  });
  // $("#payable").hide();
  $("#barcode").keyup(function(){
    if(this.value.trim()!="")
      {
        $("#productname").attr('disabled',true);
      }
      else {
        $("#productname").attr('disabled',false);
        // if($("$searchcat").value.trim()!="") $("#search").attr('disabled',false);
        // else if($("$searchname").value.trim()!="")$("#search").attr('disabled',false);
      }
  });
  $("#productname").keyup(function(){
    if(this.value.trim()!="")
      {
        $("#barcode").attr('disabled',true);
      }
      else {
        $("#barcode").attr('disabled',false);
        // if($("$searchcat").value.trim()!="") $("#search").attr('disabled',false);
        // else if($("$searchname").value.trim()!="")$("#search").attr('disabled',false);
      }
  });
  //FOR THE PRODUCT DROPDOWN DATALIST---------------------------------------------------------------------------------------------------------------------------------
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
            var list = $(this).attr('lit');
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
//DROP DOWN LIST ENDED----------------------------------------------------------------------------------
  $("#addbtn").click(function(){
      // $("#ams").hide();
      // $("#amc").hide();
      var barcode=$("#barcode").val();
      var quan=$("#quan").val();
      var cemail=$("#cemail").val();
      tv=quan;
      if(barcode==null || (!barcode.trim()==true))
      {
        alert("Enter barcode");
      }
      if(quan==null || (!quan.trim()==true)){quan=1;}
      if(cemail==null)alert("Email required");
      console.log(barcode);
      $.ajax({
        method: "post",
        url: "productbilling.php",
        data: {
          barcode: barcode,
          quan: quan,
          cemail:cemail
        },
        success: function(response)
        {
          var info=JSON.parse(JSON.stringify(response));
          var name=info[0].name;
          var price=info[0].price;
          var sgst=info[0].sgst;
          var cgst=info[0].cgst;
          var gtotal=info[0].gtotal;
          tmp=gtotal;
          gtotal=parseFloat(gtotal).toFixed(2);
          sgst=parseFloat(sgst).toFixed(2);
          cgst=parseFloat(cgst).toFixed(2);
          console.log(sgst,cgst);
          price=parseFloat(price).toFixed(2);
          // price=price.toFixed(2);
          price=parseFloat(price).toFixed(2);
          var amount=tv*price;
          amount=amount.toFixed(2);
          var amsgst=((sgst/100)*amount).toFixed(2);
          var amcgst=((cgst/100)*amount).toFixed(2);
          console.log(amsgst,amcgst);

          // console.log(price+amount);
          var markup = "<tr id='temp'><td>"+name+"</td><td>"+quan+"</td><td>"+price+"</td><td id='total'>"+amount+"</td><td id='ams'>"+amsgst+"</td><td id='amc'>"+amcgst+"</td></tr>";
          $("table tbody").append(markup);
          // $("#ams").hide();
          // $("#amc").hide();
          var TotalValue=0;var sum=0;var a=0;var c=0;
          // TotalValue=parseFloat(TotalValue);
          // TotalValue=parseFloat(TotalValue).toFixed(2);
          $("tr #total").each(function(index,value){
            currentRow = parseFloat($(this).text());
            TotalValue += currentRow;
            console.log(TotalValue);
            b=parseFloat(b);
            b=TotalValue.toFixed(2);
            console.log(jQuery.type(b));
            $("#tamt").html("<span style='text-align:center;'>Core Total: &#8377;"+b+"</span>");
            $("#oneid").text(b);
            sum=parseFloat(sum);
            b=parseFloat(b);
            sum=sum+b;
            console.log(sum);
            console.log(jQuery.type(sum));
            $("#payable").show();
          });
          var sgstvalue=0;
          $("tr #ams").each(function(index,value){
            currentRow = parseFloat($(this).text());
            sgstvalue += currentRow;
            console.log(sgstvalue);
            b=sgstvalue.toFixed(2);
            b=parseFloat(b);
            b=b.toFixed(2);
            console.log(b,jQuery.type(b));
            $("#sgst").html("<span style='text-align:center;'>SGST: &#8377;"+b+"</span>");
            $("#twoid").text(b);
            sum=parseFloat(sum);
            b=parseFloat(b);
            sum=sum+b;
            console.log(sum);
            console.log(sum);
          });
          var cgstvalue=0;
          $("tr #amc").each(function(index,value){
            currentRow = parseFloat($(this).text());
            cgstvalue += currentRow;
            console.log(cgstvalue);
            b=cgstvalue.toFixed(2);
            $("#threeid").text(b);
            $("#cgst").html("<span style='text-align:center;'>CGST: &#8377;"+b+"</span>");


            sum=parseFloat(sum);
            b=parseFloat(b);
            sum=(sum+b).toFixed(2);
            console.log(sum);
            console.log(sum);
          });
          var e1=parseFloat($("#oneid").text());
          var e2=parseFloat($("#twoid").text());
          var e3=parseFloat($("#threeid").text());
          console.log(e1,e2,e3);
          var e4=e1+e2+e3;
          e4=e4.toFixed(2);

          $("#pay").html("<span style='text-align:center;background-color:#32a852;'>Grand Total: &#8377;"+e4+"</span>");
          $("#msg").html(response);
          // $("#ams").hide();
          // $("#amc").hide();

        }

      })


      // $("#addnew").attr('disabled',true);
      // console.log(factor);
  });
  $("#generate").click(function(){
    window.open('pdfbill.php','_blank');

  });






  });
