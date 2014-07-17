<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/16/14
 * Time: 5:58 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<form action="<?php echo $this->createUrl('user/updateUser', array('id' => $model->id));?>" method="POST">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" value="<?php echo $model->username;?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $model->email;?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" value="<?php echo $model->address;?>"></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><input type="text" name="mobile" value="<?php echo $model->mobile;?>"></td>
        </tr>
        <tr>
            <td>Facebook</td>
            <td><input type="text" name="facebook" value="<?php echo $model->facebook;?>"></td>
        </tr>
        <tr>
            <td>Role</td>
            <td><input type="text" name="role"></td>
        </tr>
        <tr>
            <td></td>
            <td><input class="text" type="submit" value="Lưu" name="submit"/></td>
        </tr>
    </table>

</form>