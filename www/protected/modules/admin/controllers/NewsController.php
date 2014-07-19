<?php

class NewsController extends AdminController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/page-list-news';
//    public $layout = '//layouts/admin_son';
    public $menuActive = __CLASS__; // lay ten class luon cho menuactive

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

    public function actionExportUser(){
//        Usage:
//
//        Yii::import('ext.phpexcel.XPHPExcel');
//        $phpExcel = XPHPExcel::createPHPExcel();
//        Or if you don't want a PHPExcel object:
//
//        Yii::import('ext.phpexcel.XPHPExcel');
//        XPHPExcel::init();

        Yii::import('ext.phpexcel.XPHPExcel');
        $objPHPExcel = XPHPExcel::createPHPExcel();


//        echo date('H:i:s') , " Set document properties" , EOL;
        $objPHPExcel->getProperties()->setCreator("Ha Anh Son")
            ->setLastModifiedBy("Ha Anh Son")
            ->setTitle("PHPExcel Test Document")
            ->setSubject("Ha Anh Son setSubject")
            ->setDescription("Ha Anh Son setSubject setDescription")
            ->setKeywords("Ha Anh Son setKeywords")
            ->setCategory("Ha Anh Son setCategory");

// Add some data
//        echo date('H:i:s') , " Add some data" , EOL;
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B1', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D1', 'world!');

// Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');


        $objPHPExcel->getActiveSheet()->setCellValue('A8',"Hello\nWorld");
        $objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
        $objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);


// Rename worksheet
//        echo date('H:i:s') , " Rename worksheet" , EOL;
        $objPHPExcel->getActiveSheet()->setTitle('tenworldsheet');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="01simplebabaff.xlsx"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }

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
//            $model->content = htmlspecialchars($_POST['News']['content'], ENT_QUOTES);
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
//            $model->content = htmlspecialchars($_POST['News']['content'], ENT_QUOTES);
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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

//    /**
//     * Lists all News.
//     */
//    public function actionIndex()
//    {
//        $this->breadcrumbs = array(
//            'Tin tức',
//        );
//
//        $new = new News();
//        $category = new Category();
//        $user = new User();
//
//        $all = $new->findAll(array(
//            //"condition" => "WHERE in = '".$catID."'",
//            "order" => "pub_time ASC",
//            "limit" => 5,
//        ));
//        $all_categories = $category->findAll('parent_id is null');
//        $author = $user->findAll();
//
//        $dataProvider = new CActiveDataProvider('News');
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//            'all' => $all,
//            'all_categories' => $all_categories,
//            'author' => $author,
//        ));
//    }

    public function actionIndex()
    {
        $model = new News('search');
        $model->unsetAttributes(); // clear any default values
        // page size drop down changed
        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int)$_GET['pageSize']);
            unset($_GET['pageSize']); // would interfere with pager and repetitive page size change
        }
        if (isset($_GET['News']))
            $model->attributes = $_GET['News'];
//        var_dump($model->attributes);die;
        $this->render('new_index', array(
            'model' => $model,
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
        foreach ($subCatInfo as $value) {
            $subCat[] = $value['in'];
        }
//        var_dump($subCat);die;
        $subCatSql = implode(',', $subCat);
//        var_dump($subCatSql);die;
        if ($subCat) {
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
