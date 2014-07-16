<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/16/14
 * Time: 1:44 PM
 * To change this template use File | Settings | File Templates.
 */ 
?>
<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
</style>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Username</td>
        <td>Email</td>
        <td>Mobile</td>
        <td>Facebook</td>
        <td>Address</td>
    </tr>
    <?php foreach($listUser as $user) { ?>
        <tr>
            <td><a href="<?php echo Yii::app()->createUrl("user/UpdateUser",array("id"=>$user->id));?>"><?php echo $user->id;?></a></td>
            <td><?php echo $user->username;?></td>
            <td><?php echo $user->email;?></td>
            <td><?php echo $user->mobile;?></td>
            <td><?php echo $user->facebook;?></td>
            <td><?php echo $user->address;?></td>
        </tr>
    <?php } ?>
</table>