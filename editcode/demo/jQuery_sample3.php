<?php 
/**
 * Waiting on the DOM to be ready 
jQuery fires a custom event named ready when the DOM is loaded and available for 
manipulation. Code that manipulates the DOM can run in a handler for this event. This is a 
common pattern seen with jQuery usage. 
The following sample features three coded examples of this custom event in use.  
 **/
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script>
            // Standard
            jQuery(document).ready(function () { alert('DOM is ready!'); });
            
            // Shortcut, but same thing as above 
            jQuery(function () { alert('No really, the DOM is ready!'); });
            
            // Shortcut with fail-safe usage of $. Keep in mind that a reference 
            // to the jQuery function is passed into the anonymous function. 
            jQuery(function ($) {     
                    alert('Seriously its ready!');
                    // Use $() with out fear of conflicts 
            });
            $(document).ready(function(){
            alert('baba');
            });
        </script>
    </head>
    
    <body></body>

</html>