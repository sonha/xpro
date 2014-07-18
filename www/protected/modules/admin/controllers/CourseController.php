<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/18/14
 * Time: 4:03 PM
 * To change this template use File | Settings | File Templates.
 */
class CourseController extends AController{

    public function actionIndex() {
        $model = new Course('search');
        $model->unsetAttributes(); // clear any default values
        // page size drop down changed
        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int)$_GET['pageSize']);
            unset($_GET['pageSize']); // would interfere with pager and repetitive page size change
        }
        if (isset($_GET['Course']))
            $model->attributes = $_GET['Course'];
        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Course();
        if (isset($_POST['Course'])) {
            $model->attributes = $_POST['Course'];
//            var_dump($model->attributes);die;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->redirect(array('index'));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Course'])) {
            $model->attributes = $_POST['Course'];
            if ($model->save())
//                $this->redirect(array('view', 'id' => $model->id));
                $this->redirect(array('index'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function loadModel($id)
    {
        $model = Course::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
}