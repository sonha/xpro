<?php 
$link = mysql_connect('192.168.7.19:3307', 'mobi_sg19_x17', 'sklsBonC2W7Ba4R5bHBw');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
if (!mysql_select_db('db_mobi_sg19_x17', $link)) {
    echo 'Could not select database';
    exit;
}
$sql    = 'SELECT * FROM ct_giftcode_500 WHERE user_id <> ""';
//$sql    = 'SELECT * FROM category WHERE id = 6';
$result = mysql_query($sql, $link);
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
?>
<table border='1'>
            <tr>
    			<td>ID</td>
				<td>Name</td>
				<td>Status</td>
			</tr>
            <?php while ($row = mysql_fetch_assoc($result)) { ?>  
            <tr>
    			<td><?php echo $row['user_id'];?></td>
				<td><?php echo $row['created_date'];?></td>
				<td><?php echo $row['code'];?></td>
			</tr>
            <?php } ?>
</table>
<?php 
mysql_free_result($result);
mysql_close($link);
?>