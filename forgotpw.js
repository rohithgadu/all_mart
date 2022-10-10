$('button').click(function() {
  var x=$("input").val();
  var randomint='<?php echo $randomint; ?>';
  console.log(randomint);
  $("h3").html(x);

})
