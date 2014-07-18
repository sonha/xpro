<?php

/**
 * Class ErrorController
 * Class thuc hien hien thi cac cau thong bao loi neu gap loi xay ra
 */
class ErrorController extends Controller
{
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
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
//            var_dump($error);die;
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

}