<!DOCTYPE html>
<html lang="en">
<body>
    <div class="sonha"></div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    function test(){
    
    };
    // alert('baba');
    $.ajax({
    url : "http://api.flickr.com/services/feeds/photos_public.gne?tags=resig&tagmode=all&format=json&jsoncallback=?" ,
    dataType : "json",
    success: function(data){
    $.each(data.items, function(i, data){
    // alert(data.media.m);
    // $("<span>"+data.media.m+"</span>").appendTo('.sonha');
    // +data.media.m.appendTo('.sonha');
    $('<img />').attr("src", data.media.m).appendTo('body');
     if (i == 30) return false;    
    // $('<img />').attr("src", data.media.m).appendTo('body'); if (i == 30) return false;
    })
    }
    });
    });
    </script>
</body>
</html>