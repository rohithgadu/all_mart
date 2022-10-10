// console.log("chgfjh");
// $(document).ready(function(){
//   function GetDetail(str) {
//             if (str.length == 0) {
//                 document.getElementById("name").value = "";
//                 document.getElementById("category").value = "";
//                 document.getElementById("date").value = "";
//                 return;
//             }
//             else {
//
//                 // Creates a new XMLHttpRequest object
//                 var xmlhttp = new XMLHttpRequest();
//                 xmlhttp.onreadystatechange = function () {
//
//                     // Defines a function to be called when
//                     // the readyState property changes
//                     if (this.readyState == 4 &&
//                             this.status == 200) {
//
//                         // Typical action to be performed
//                         // when the document is ready
//                         var myObj = JSON.parse(this.responseText);
//
//                         // Returns the response data as a
//                         // string and store this array in
//                         // a variable assign the value
//                         // received to first name input field
//
//                         document.getElementById
//                             ("first_name").value = myObj[0];
//
//                         // Assign the value received to
//                         // last name input field
//                         document.getElementById(
//                             "last_name").value = myObj[1];
//                     }
//                 };
//
//                 // xhttp.open("GET", "filename", true);
//                 xmlhttp.open("GET", "gfg.php?user_id=" + str, true);
//
//                 // Sends the request to the server
//                 xmlhttp.send();
//             }
//         }
//   var factor=5;var vv1="",vv2="",vv3="",vv4=0,vv5=0;
//   $("#addnew").click(function(){
//       var markup = "<tr id='temp'><td><input type='text' name='pid' class='inputrow' id= 'pid' style='width:60px;'></td><td id='tdname'><input type='text' name='pname' class='inputrow' id= 'pname' style='width:60px;'></td><td id='tdcategory'><input type='text' name='category' class='inputrow' id= 'category' style='width:60px;'></td><td><input type='number' name='ex' class='inputrow' min='1' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'ex' style='width:60px;'></td><td><input type='number' name='mql' class='inputrow' min='1' oninput='this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null' id= 'mql' style='width:60px;'</td><td id='tddate'><input type='date' name='idate' class='inputrow' id= 'idate' style='width:160px;'></td><tr>";
//       // $("#pid").on("input", function(){
//       //       // Print entered value in a div box
//       //       $("#name").text($(this).val());
//       //       var a=  $("#name").text();
//       //       console.log(a);
//       //
//       // });
//       $("table tbody").append(markup);
//       $("#addnew").attr('disabled',true);
//       console.log(factor);
//   });
//   $("#stocktable").on("click", "#save", function() {
//       var pid = $("#pid").val();
//       var ex = $("#ex").val();
//       var mql = $("#mql").val();
//       var pname=$("#pname").val();
//       var category=$("#category").val();
//       var idate=$("#idate").val();
//       var markup = "<tr><td>"+pid+"</td><td>" + pname + "</td><td>" + category + "</td><td>" + ex +"</td><td>" +mql+"</td><td>"+idate+"</td><td><button class='btn' id='edit'><i class='fa fa-edit'></i></button></td></tr>";
//       if(category ==null || pid ==null || pname==null || mql==null || idate==null || ex==null || (!category.trim()==true) || (!pid.trim()==true) || (!pname.trim()==true) || (!mql.trim()==true)|| (!idate.trim()==true))
//       {
//         alert("Nothing to save. Empty fields present");
//         return;
//       }
//       // console.log(!category.trim());
//       $("table tbody").append(markup);
//       $("table#stocktable tr#temp").remove();
//       $("#addnew").attr('disabled',false);
//       // console.log(tprice);
//       $.ajax({
//         method: "post",
//         url: "stocksave.php",
//         data: {
//           category: category,
//           pid: pid,
//           pname: pname,
//           ex: ex,
//           mql: mql,
//           idate: idate
//         },
//         success: function(response)
//         {
//           $("#msg").html(response);
//         }
//
//       })
// });
//
//
//
//
// });
