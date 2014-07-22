<?php
header('X-XSS-Protection: 0');
function render($view, $vars)
{
    extract($vars);
    ob_start();
    include($view);
    $content = ob_get_clean();
    return $content;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="jquery-1.8.3.min.js"></script>
    <title>Coc Editor v1.0</title>
    <link rel="shortcut icon" href="http://sohagame.vn/wp-content/themes/sohahome/shg_frontend/images/website/favicon.ico" type="image/x-icon" />
</head>
<link href="css/style.css" rel="stylesheet">
<body style="background-color:#e5eecc;margin: 0;" cz-shortcut-listen="true">
<div id="lecture" style="padding: 37px 550px;">
    <a href="demo">List bài tập</a>
    <a href="admin.php">Admin</a>
</div>
<div id='content'>
    <?php
    if (!empty($_POST)){
        $filename = 'tryit.php';
        $source = $_POST['source'];
        if (is_writable($filename)) {
            if (!$handle = fopen($filename, 'w')) {
                echo "Cannot open file ($filename)";
                exit;
            }
            if (fwrite($handle, $source) === FALSE) {
                echo "Cannot write to file ($filename)";
                exit;
            }
            echo "<div class='headerText1'>Success, wrote to file ($filename)</div>";
            fclose($handle);
        } else {
            echo "The file $filename is not writable";
        }
    }
    ?>
    <?php
    if(empty($_POST)) {
        $source = file_get_contents('demo/introduction.php');
    } else {
        $source = file_get_contents('tryit.php');
    }
    ?>
    <div id="sourcecode">
        <div class="headerText">Source:</div>
        <form method='post'>
            <div id="submit" style="margin-left: 496px">
                <input type='submit'  id='submit-form' value="Submit»">
            </div>
            <pre id='editor' ><?php echo htmlspecialchars($source)?></pre><br/>
            <textarea name='source' class='textarea-hidden' ></textarea>
        </form>
    </div>
    <div id="result">
        <div class="headerText">Result:</div>
        <div class="headerText" style="right:10px;">
            <a style="color:#617f10" href='?test=true'>Don't render</a> |
            <a href='./index.php'>Render</a> |
            <a href='./dates.php'>Dates</a> |
            <a href='./gen.php'>Gen HTML</a> |
            <a href="#" id='use-jquery'>Use jQuery</a>
        </div>
        <iframe src='tryit.php' onLoad="autoResize('iframeResult');" id="iframeResult" class="result_output" frameborder="0" name="view" src="" width="400"></iframe>
    </div>
    <div style="clear:both;"></div>
</div>
<script src='ace/build/src/ace.js'></script>
<script type="text/javascript">
    var $ = document.getElementById.bind(document);
    var dom = require("ace/lib/dom");

    var commands = require("ace/commands/default_commands").commands;
    commands.push({
        name: "Toggle Fullscreen",
        bindKey: "F11",
        exec: function(editor) {
            dom.toggleCssClass(document.body, "fullScreen")
            dom.toggleCssClass(editor.container, "fullScreen")
            editor.resize()
        }
    });
    commands.push({
        name: "Submit",
        bindKey: "F9",
        exec: function(editor) {
            jQuery('#submit-form').trigger('click');
        }
    })
    var editor = ace.edit("editor");
    editor.setFontSize('15px');
    editor.setTheme("ace/theme/twilight");
    editor.session.setMode("ace/mode/php");

    jQuery('#submit-form').click(function() {
        jQuery("textarea[name='source']").text(editor.getValue());
        jQuery(this).closest('form').submit();
    })
    function autoResize(id){
        var newheight;
        var newwidth;

        if(document.getElementById){
            newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
            newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
        }

        document.getElementById(id).height= (newheight) + "px";
        document.getElementById(id).width= (newwidth) + "px";
    }

    script=document.createElement('script'); script.type = 'text/javascript';
    script.src='jquery-1.8.3.min.js';

    jQuery("#use-jquery").click(function() {
        editor.insert(script.outerHTML);
    })
</script>
</body>
</html>
