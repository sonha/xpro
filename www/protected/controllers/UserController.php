<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/16/14
 * Time: 1:43 PM
 * To change this template use File | Settings | File Templates.
 */
class UserController extends Controller{

    /*
     * $defaultAction
     * Set default action in controller
     * Neu khong co $defaultAction nay thi se lay actionIndex lam action mac dinh.
     */
//    public $defaultAction = 'listUser';

    public function actionIndex() {
        /**
         * Khai bao trong config/main.php nhu sau
         * 'defaultController' => 'user',
         */
        echo 'Day la default Controller';
        die();
    }
    /**
     * Todo: Ham list toan bo User
     * Author: Son Ha Anh (sonhaanh@vccorp.vn)
     * Create:
     * Update:
     * Output: Nones
     * Link : http://localhost/xpro/www/index.php?r=user/listUser
     */
    public function actionListUser() {
        $this->setPageTitle("List User");
        $model = new User();
//        $listUser = $model->findAll();
//        $listUser = $model->findAll(array('order'=>'id asc'));
        $listUser = $model->findAll(array('order'=>'id desc'));
        $this->render('list',array('listUser' => $listUser));
    }

    /**
     * Todo: Ham tao user moi
     * Author: Son Ha Anh (sonhaanh@vccorp.vn)
     * Create:
     * Update:
     * Output: None
     */
    public function actionCreateUser(){
        $model = new User();
        if (isset($_POST)) {
            $model->username = $_POST['username'];
            $model->email = $_POST['email'];
            $model->facebook = $_POST['facebook'];
            $model->mobile = $_POST['mobile'];
            $model->address = $_POST['address'];
            $model->role = $_POST['role'];
            if ($model->save()) {
                Yii::app()->user->setFlash('user', 'Thank you for contacting us. We will respond to you as soon as possible.');
//                $this->refresh();
                //redirect den trang list User sau khi insert
                //http://localhost/xpro/www/index.php?r=user/listUser
                $this->redirect(array('listUser'));
            }
        }

        $this->render('create');
    }

    /**
     * Todo: Ham tao user moi
     * Author: Son Ha Anh (sonhaanh@vccorp.vn)
     * Create:
     * Update:
     * Output: None
     */
    public function actionUpdateUser($id){
        $model = $this->loadModel($id);
//        $model = User::model()->findByPk($id);
//        var_dump($model->username);die;
        if (isset($_POST['submit'])) {
            $model->username = $_POST['username'];
            $model->email = $_POST['email'];
            $model->facebook = $_POST['facebook'];
            $model->mobile = $_POST['mobile'];
            $model->address = $_POST['address'];
            $model->role = $_POST['role'];
            if ($model->save()) {
//                Yii::app()->user->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                //redirect den trang list User sau khi insert
                //http://localhost/xpro/www/index.php?r=user/listUser
                $this->redirect(array('listUser'));
            }
        }
        $this->render('update',array('model' => $model));
    }



    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        echo '<script>alert("Delete Successful")</script>';
//        header('Location: http://localhost/xpro/www/index.php?r=user/listUser');
        $this->redirect(array('listUser'));

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//        if (!isset($_GET['ajax']))
//            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionSendMail(){
//        Util::sendEmail('hason61vn@gmail.com', 'Test Email', 'Test Email Content');
        Util::sendEmailGmail('hason61vn@gmail.com', 'Test Email', 'http://localhost/xpro/www/index.php?r=user/ActiveEmail&userid=1&verifyCode=123456');
    }

    //http://localhost/xpro/www/index.php?r=user/ActiveEmail&id=1&verifyCode=123456
    public function actionActiveEmail(){
//        die('babacc');
        $userId = $_GET['userid'];
        $verifyCode = $_GET['verifyCode'];
//        var_dump($userId);
//        var_dump($verifyCode);
        $model = new User();
        $user = $model->findByPk($userId);
//        var_dump($user);die;

//        $model = $this->loadModel($userId);
        if($user->verifyCode == $verifyCode) {
            echo 'Actived';
        } else {
            echo 'Chua active';
        }

    }
}