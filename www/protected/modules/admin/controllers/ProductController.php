<?php

class ProductController extends Controller
{

    public $layout='//layouts/admin_son';
    public $menuActive = __CLASS__;// lay ten class luon cho menuactive
    public $action;
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionList()
	{
        $model = new Product();
        $list_model = $model->findAll();
		$this->render('list_product',
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
        $model = new Product();
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
        $model = new Product();
        Utils::autoSetValueToObject($model, $_POST);
        $total = (int) $model->count_sql($model);
        $page = isset($_POST['page']) ? (int) $_POST['page'] : 1;
        $pagination = Utils::paginate($total, $page,0, 5);
        $list_model = $model->search_sql($model, $pagination);
        $this->renderPartial("test", compact("list_model", "pagination", "model"));
    }

    public function actionDelete($id){
        $model = User::model()->findByPk($id);
        if($model->delete()){
            Yii::app()->user->setFlash('del_success', "delete success!");
            $this->redirect(array('list'));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Type the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Type::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}