<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Emmet toolkit for &lt;textarea&gt;</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 0.8em;
        }

        textarea {
            width: 90%;
            height: 20em;
        }
    </style>
    <script src="emmet.js"></script>
</head>
<body>
<div style='float:right'>
    <a href='?test=true'>Don't render</a> |
    <a href='./index.php'>Quay lại</a> |
    <a href='./dates.php'>Dates</a> |
    <a href='./gen.php'>Gen HTML</a>
</div><br><br>
<textarea>html:5>div#page>div#header>ul.navigation>li*4>a</textarea>
<script>
    emmet.require('textarea').setup({
        pretty_break: true, // enable formatted line breaks (when inserting
        // between opening and closing tag)
        use_tab: true       // expand abbreviations by Tab key
    });
</script>
</body>
</html>