<!DOCTYPE html>
<html lang="en">
<body>
    <a></a>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script> 
    (function ($) {
     $('a').text('jQuery') // Sets text to jQuery and then returns $('a')     
      .attr('href', 'http://www.jquery.com/') // Sets the href attribute and then returns $('a')     
      .addClass('jQuery'); // Sets class and then returns $('a') 
 })(jQuery) 
 </script>
</body>
</html>