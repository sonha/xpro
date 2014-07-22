<div style='float:right'>
    <a href='?test=true'>Don't render</a> |
    <a href='./index.php'>Quay lại</a> |
    <a href='./dates.php'>Dates</a> |
    <a href='./gen.php'>Gen HTML</a>
</div><br><br>
<div style='width:500px;margin:auto'>
	<center>
<?php
$from = strtotime('-10 days');
$to = strtotime('+10 days');
while ($from < $to) {
	echo date ("Y-m-d", $from) . " - " . strtotime(date ("Y-m-d", $from)) . "<br/>";
	$from += 86400;
}
?>
</center>
<br/>
<form>
		<label>Timestamp</label>
		<input type='text' name='timestamp' />
		<label>Date</label>
		<input type='text' name='date' />
		<input type='submit' />
</form>
<?php
if (!empty($_GET['timestamp'])) {
	echo 'Timestamp to date: <strong>' . date('d-m-Y H:i:s', $_GET['timestamp']) . '</strong><br/>';
}
if (!empty($_GET['date'])) {
	echo 'Date to timestamp: <strong>' . strtotime($_GET['date']) . '</strong>';
}
?>
</div>