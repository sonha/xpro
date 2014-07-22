<html>
<head>
<style>
body
{
background-color:‪#‎d0e4fe‬;
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<h1>CSS demo!</h1>
<form method="POST" action="" name="frm">
<lable>Nhập số cạnh: </lable>
<input type="text" name="so1" id="so1" size="25"/>
<input type="text" name="so2" id="so2" size="25"/>
<input type="submit" name="cong" value="+">
<input type="submit" name="tru" value="-">
<input type="submit" name="nhan" value="*">
<input type="submit" name="chia" value="/"><br/>
</form>
<br/>

<?php
error_reporting(E_ALL &~ E_NOTICE &~ E_WARNING);
function nhan($a, $b){
$c = $a*$b;
return $c;
}
function cong($a, $b){
$c = $a+$b;
return $c;
}
function tru($a, $b){
$c = $a-$b;
return $c;
}
function chia($a, $b){
$c = $a/$b;
return $c;
}
$so1=$_POST['so1'];
$so2=$_POST['so2'];
if($_POST['cong']){
echo "<lable style='border: 1px solid red; background-color:ffffff;'> Kết quả: ".cong($so1, $so2)."</lable>";
}
if($_POST['tru']){
echo "<lable style='border: 1px solid red; background-color:ffffff;'> Kết quả: ".tru($so1, $so2)."</lable>";
}
if($_POST['nhan']){
echo "<lable style='border: 1px solid red; background-color:ffffff;'> Kết quả: ".nhan($so1, $so2)."</lable>";
}
if($_POST['chia']){
echo "<lable style='border: 1px solid red; background-color:ffffff;'> Kết quả: ".chia($so1, $so2)."</lable>";
}

?>
</body>
</html>