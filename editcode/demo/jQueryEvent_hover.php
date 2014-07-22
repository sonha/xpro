<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script>
$(document).ready(function(){
  $("#p1").hover(function(){
    alert("You entered p1!");
    },
    function(){
    alert("Bye! You now leave p1!");
  }); 
});
</script>
</head>
<body>

<p id="p1">This is a paragraph.</p>

</body>
</html>
