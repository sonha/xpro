<html>
<head>
<style>
body
{
background-color:#d0e4fe;
}
h1
{
color:orange;
text-align:center;
}
p
{
font-family:"Times New Roman";
font-size:20px;
}
</style>
</head>
<body>
<?php 
    $x = 10;
    $y = 7;
 
    $op = array('+' => $x+$y , 
                '-' => $x-$y , 
                '*' => $x*$y ,
                '/' => $x/$y ,
                '%' => $x%$y);
 
    foreach ($op as $operator => $operation) {
        echo "$x $operator $y = ".$operation."<br />";
    }
 ?>
</body>
</html>
