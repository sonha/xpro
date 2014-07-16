<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/16/14
 * Time: 1:43 PM
 * To change this template use File | Settings | File Templates.
 */
class UserController extends Controller{

    /**
     * Todo: Ham list toan bo User
     * Author: Son Ha Anh (sonhaanh@vccorp.vn)
     * Create:
     * Update:
     * Output: None
     * Link : http://localhost/xpro/www/index.php?r=user/listUser
     */
    public function actionListUser() {
        $model = new User();
        $listUser = $model->findAll();
        $this->render('list',array('listUser' => $listUser));
    }
}