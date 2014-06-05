<?php

class NewsController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/page-list-news';
    public $layout='//layouts/admin_son';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */

    /*	public function accessRules()
        {
            return array(
                array('allow',  // allow all users to perform 'index' and 'view' actions
                    'actions'=>array('index','view'),
                    'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions'=>array('create','update'),
                    'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                    'actions'=>array('admin','delete'),
                    'users'=>array('admin'),
                ),
                array('deny',  // deny all users
                    'users'=>array('*'),
                ),
            );
        }*/

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new News();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            //var_dump($model->attributes);die;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
                //$this->redirect(array('list'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->idNews));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all News.
     */
    public function actionIndex()
    {
        $this->breadcrumbs = array(
            'Tin tức',
        );

        $new = new News();
        $category = new Category();
        $user = new User();

        $all = $new->findAll(array(
            //"condition" => "WHERE in = '".$catID."'",
            "order" => "pub_time ASC",
            "limit" => 5,
        ));
        $all_categories = $category->findAll('parent_id is null');
        $author = $user->findAll();

        $dataProvider = new CActiveDataProvider('News');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
            'all' => $all,
            'all_categories' => $all_categories,
            'author' => $author,
        ));
    }

    /**
     * Lists News in Category.
     */
    public function actionList($catid)
    {
        $this->breadcrumbs = array(
            'Tin tức',
        );

        $new = new News();
        $category = new Category();
        $user = new User();

        $subCatInfo = $category::getAllSubCat($catid);
//        var_dump($subCatInfo);die;
        $subCat = array();
        foreach($subCatInfo as $value) {
            $subCat[] = $value['in'];
        }
//        var_dump($subCat);die;
        $subCatSql = implode(',', $subCat);
//        var_dump($subCatSql);die;
        if($subCat) {
            $list = $new->findAllBySql('SELECT * FROM news WHERE catid IN ("' . $subCatSql . '") ORDER BY pub_time ASC');
//            var_dump($list);die;
        } else {
        $list = $new->findAllBySql('SELECT * FROM news WHERE catid="' . $catid . '" ORDER BY pub_time ASC');
        }
        /*if($list){

        }*/
//        var_dump($list);die;
        $all_categories = $category->findAll('parent_id is null');
        $author = $user->findAll();

        $this->render('list', array(
            'list' => $list,
            'all_categories' => $all_categories,
            'author' => $author,
            'catid' => $catid,
        ));
    }

    /*
     * Details News
     * */
    public function actionDetailNews($idNews)
    {
        $detail = new News();
//        var_dump($idNews);die;
        $content = $detail->findByPk($idNews);
        $this->render('detail', array('content' => $content));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new News('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['News']))
            $model->attributes = $_GET['News'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return News the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = News::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param News $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
