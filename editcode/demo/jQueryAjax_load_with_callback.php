<!DOCTYPE html>
<html>
<head>
<link type="text/css" href="http://localhost/editcode/css/stdtheme.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("#div1").load("demo_jquery_ajax",function(responseTxt,statusTxt,xhr){
      if(statusTxt=="success")
        alert("External content loaded successfully!");
      if(statusTxt=="error")
        alert("Error: "+xhr.status+": "+xhr.statusText);
    });
  });
});
</script>
</head>
<body>
<p><b>Syntax:</b></p>
<div class="code notranslate">
    <div>
$(<i>selector</i>).load(<i>URL,data,callback</i>);
</div></div>
<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>
<button>Get External Content</button>

</body>
</html>
