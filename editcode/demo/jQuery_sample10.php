<!DOCTYPE html>
<html lang="en">
<body>
    <a id="link1">jQuery.com</a> 
    <a id="link2">jQuery.com</a> 
    <a id="link3">jQuery.com</a>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script> 
    (function ($) { 
      $('a').mouseenter(
          function () { 
          alert(this.id); 
          });
    })(jQuery);
    
    </script>
</body>
</html>