<!DOCTYPE html>
<html lang="en">
<body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>  (function($){       
      
          // Using ? just means call the callback function provided          
          $.ajax({
          type : "GET",
          dataType: "json",
          url : "http://api.flickr.com/services/feeds/photos_public.gne?tags=resig&tagmode=all&format=json&jsoncallback=?",
          success : function(data){
         // alert(data);
           $.each(data.items, function (i, item) { $('<img />').attr("src", item.media.m).appendTo('body'); if (i == 30) return false; });
          }
          });
           return false;
  })(jQuery); 
  </script>
</body>
</html>