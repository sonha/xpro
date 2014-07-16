<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/16/14
 * Time: 5:58 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<form action="index.php?r=user/updateUser" method="POST">
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
            <td></td>
            <td><input class="text" type="submit" value="Lưu"/></td>
        </tr>
    </table>

</form>