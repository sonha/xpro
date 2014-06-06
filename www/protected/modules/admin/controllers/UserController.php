<?php

class UserController extends Controller
{

    public $layout='//layouts/admin_son';
    public $menuActive = __CLASS__;// lay ten class luon cho menuactive
    public $action;

    /**
     * Lay ten controller :
     * Cach 1 : Yii::app()->controller->id); => string(4) "user"
     * Cach 2 : $this->getId();
     */

    /**
     * Lay ten action :
     * Cach 1 : $this->getAction()->getId();
     */

    /**
     * Action List toan bo User o trang index
     * @author : SonHA
     * @Date : 2/6/2014
     */
    public function actionIndex()
    {
        $model = new User('search');
        $model->unsetAttributes(); // clear any default values
        // page size drop down changed
        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
        }
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];
//        var_dump($model->attributes);die;
        $this->render('index', array(
            'model' => $model,
        ));
    }

	public function actionList()
	{
//        var_dump($this->layout);die;
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $user = new User();
        $list_model = $user->findAll();
		$this->render('list_user',
            array('list_model' => $list_model)
        );
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionCreate(){
		$this->render('create', array(

			));
	}

	public function actionSave(){
		$model = new User();
        Utils::autoSetValueToObject($model, $_POST); //gan cac post
		if($model->save()){
			$this->redirect(array('list'));
		}else{
			Yii::app()->user->setFlash('fail', Utils::setAllErrorsToArray($model->getErrors()));
			$this->redirect(array('create'));
		}
	}

    public function actionEdit($id){
        $model = User::model()->findByPk($id);
        $this->render('edit', array(
            'model'=>$model
        ));
    }

    public function actionUpdate($id){
        $model = User::model()->findByPk($id);
        $model->userName = $_POST['user_name'];
        $model->pass = $_POST['pass'];
        $model->email = $_POST['mail'];

        if($model->update()){
            $this->redirect(array('list'));
        }
    }

//    public function actionUpdate() {
//        $id = isset($_POST['id']) ? $_POST['id'] : "";
//        $model = $this->loadModel($id);
//        Utils::autoSetValueToObject($model, $_POST);
//        if ($model->save()) {
//            $this->redirect(array('view', 'id' => $model->id));
//        } else {
//            Utils::setSession("model", $model);
//            Yii::app()->user->setFlash('fail', Utils::setAllErrorsToArray($model->getErrors()));
//            $this->redirect(array('edit', 'id' => $id));
//        }
//    }

    public function actionAdmin() {
        $this->action = __FUNCTION__;
        $model = new User();
        Utils::autoSetValueToObject($model, $_POST);
        $total = (int) $model->count_sql($model);
        $page = isset($_POST['page']) ? (int) $_POST['page'] : 1;
        $pagination = Utils::paginate($total, $page,0, 5);
//        var_dump($pagination);die;
        $list_model = $model->search_sql($model, $pagination);
        Utils::setSession("model", $model);
        $this->render("admin", compact("list_model", "pagination", "model"));
    }

    public function actionAjaxSearch() {
        $model = new Type;
        Utils::autoSetValueToObject($model, $_POST);
        $total = (int) $model->count_sql($model);
        $page = isset($_POST['page']) ? (int) $_POST['page'] : 1;
        $pagination = Utils::paginate($total, $page,0, 5);
        $list_model = $model->search_sql($model, $pagination);
        $this->renderPartial("test", compact("list_model", "pagination", "model"));
    }

//    public function actionDelete($id){
//        $model = User::model()->findByPk($id);
//        if($model->delete()){
//            Yii::app()->user->setFlash('del_success', "delete success!");
//            $this->redirect(array('list'));
//        }
//    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Type the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}