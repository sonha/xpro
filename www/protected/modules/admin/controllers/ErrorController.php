<?php

/**
 * Class ErrorController
 * Class thuc hien hien thi cac cau thong bao loi neu gap loi xay ra
 */
class ErrorController extends AdminController
{
    public $menuActive = __CLASS__; // lay ten class luon cho menuactive
    /**
     * @SonHA: Day la action mac dinh
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionErrorShow()
    {
        $this->setPageTitle('Đã có lỗi xảy ra');
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                if ($error['code'] = '404') {
                    $this->render('error_404_admin', $error);
                } else {
                    $this->render('error_500_admin', $error);
                }
            }
        }
    }

}