<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("p:first").hide();
  });
});
</script>
</head>
<body>

<h2>Selects the first element</h2>
<p>This is a paragraph.</p>
<p>This is another paragraph.</p>
<button>Click me</button>

</body>
</html>
