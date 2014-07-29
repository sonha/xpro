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
    th {
        height: 50px;
        background-color: #ff807b;
        color: white;
    }
</style>
<a href="index.php?r=user/createUser">Thêm mới user</a></br></br>
<?php if(Yii::app()->user->hasFlash('user')){ ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('user'); ?>
    </div>

<?php } ?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Facebook</th>
        <th>Address</th>
        <th>Role</th>
        <th>Hành động</th>
    </tr>
    <?php foreach($listUser as $user) { ?>
        <tr>
            <td><a href="<?php echo Yii::app()->createUrl("user/UpdateUser",array("id"=>$user->id));?>"><?php echo $user->id;?></a></td>
            <td><?php echo $user->username;?></td>
            <td><?php echo $user->email;?></td>
            <td><?php echo $user->mobile;?></td>
            <td><?php echo $user->facebook;?></td>
            <td><?php echo $user->address;?></td>
            <td><?php echo $user->role;?></td>
            <td><a href="<?php echo Yii::app()->createUrl("user/delete",array("id"=>$user->id));?>">Xóa</a></td>
        </tr>
    <?php } ?>
</table>