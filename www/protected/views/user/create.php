<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/16/14
 * Time: 5:58 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<?php if(Yii::app()->user->hasFlash('user')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('user'); ?>
    </div>

<?php else: ?>
<form action="index.php?r=user/createUser" method="POST">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="text" name="mobile"></td>
        </tr>
        <tr>
            <td>Facebook</td>
            <td><input type="text" name="facebook"></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><input type="text" name="role"></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="text" type="submit" value="Lưu"/></td>
        </tr>
    </table>

</form>
<?php endif; ?>