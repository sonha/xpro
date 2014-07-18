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
        $this->render('course_index', array(
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
}