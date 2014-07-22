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
    <link rel="shortcut icon"
          href="http://sohagame.vn/wp-content/themes/sohahome/shg_frontend/images/website/favicon.ico"
          type="image/x-icon"/>
    <link href="css/style.css" rel="stylesheet">
</head>
<body style="background-color:#e5eecc;margin: 0;" cz-shortcut-listen="true">
<div id="lecture" style="padding: 37px 550px;">
    <a href="demo">List bài tập</a>
</div>
<div id='content'>
    <?php
    if (!empty($_POST)) {
        if ($_POST['file_name']) {
            $txt_filename = $_POST['file_name'];
        } else {
            $txt_filename = 'noname';
        }
        $mode = ($txt_filename == 'noname') ? "w" : "x+";
        $fp = fopen("demo/" . $txt_filename . ".php", $mode);
        $filename = "demo/" . $txt_filename . ".php";
        $filename_try = 'tryit.php';
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
            $writable = true;
            fclose($handle);
        } else {
            echo "The file $filename is not writable";
        }
        if (is_writable($filename_try)) {
            if (!$handle_try = fopen($filename_try, 'w')) {
                echo "Cannot open file ($filename_try)";
                exit;
            }
            if (fwrite($handle_try, $source) === FALSE) {
                echo "Cannot write to file ($filename_try)";
                exit;
            }
            $writable = true;
            fclose($handle_try);
        } else {
            echo "The file $filename_try is not writable";
        }
        if($writable) {
        echo "<div class='headerText1'>Success, wrote to file ($filename) and ($filename_try)</div>";
        }
    }
    ?>
    <?php
    $directory = "demo/";
    //get all text files with a .txt extension.
    $texts = glob($directory . "*.php");
    //print each file name
    $name_arr = array();
    foreach($texts as $text)
    {
        $temp = explode('/',$text);
        $name_arr[] = $temp[1];
    }
    if (empty($_POST)) {
        $source = file_get_contents('tryit.php');
    } else {
        if(!empty($_POST['file_name_load'])) {
            $file_name_load = $_POST['file_name_load'];
            $source = file_get_contents("demo/$file_name_load");
//            var_dump(htmlspecialchars($source));die;
        } else {
        $source = file_get_contents("demo/$txt_filename.php");
        }

    }
    ?>
    <div id="sourcecode">
        <div class="headerText"></div>
        <form method='post'>
            <div id="submit" style="margin-left: 38px">
                Lưu : <input type="text" name="file_name"/>
                Load : <select name="file_name_load" id="">
                    <option value="" selected>Bài demo</option>
                    <?php foreach($name_arr as $key){ ?>
                        <option value="<?php echo $key;?>"><?php echo $key;?></option>
                    <?php } ?>
                </select>
                <input type='submit' id='submit-form' value="Submit»">
            </div>
            <pre id='editor'><?php echo htmlspecialchars($source) ?></pre>
            <br/>
            <textarea name='source' class='textarea-hidden'></textarea>
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
        <iframe src='tryit.php' onLoad="autoResize('iframeResult');" id="iframeResult" class="result_output"
                frameborder="0" name="view" src="" width="400"></iframe>
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
        exec: function (editor) {
            dom.toggleCssClass(document.body, "fullScreen")
            dom.toggleCssClass(editor.container, "fullScreen")
            editor.resize()
        }
    });

    commands.push({
        name: "Submit",
        bindKey: "F9",
        exec: function (editor) {
            jQuery('#submit-form').trigger('click');
        }
    })

    var editor = ace.edit("editor");
    editor.setFontSize('15px');
    editor.setTheme("ace/theme/twilight");
    editor.session.setMode("ace/mode/php");

    jQuery('#submit-form').click(function () {
        jQuery("textarea[name='source']").text(editor.getValue());
        jQuery(this).closest('form').submit();
    })

    function autoResize(id) {
        var newheight;
        var newwidth;

        if (document.getElementById) {
            newheight = document.getElementById(id).contentWindow.document.body.scrollHeight;
            newwidth = document.getElementById(id).contentWindow.document.body.scrollWidth;
        }

        document.getElementById(id).height = (newheight) + "px";
        document.getElementById(id).width = (newwidth) + "px";
    }

    script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'jquery-1.8.3.min.js';

    jQuery("#use-jquery").click(function () {
        editor.insert(script.outerHTML);
    })
</script>

</body>
</html>
