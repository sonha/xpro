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
    public $defaultAction = 'listUser';

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
     * Output: None
     * Link : http://localhost/xpro/www/index.php?r=user/listUser
     */
    public function actionListUser() {
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
//                Yii::app()->user->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
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
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Product the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=User::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}