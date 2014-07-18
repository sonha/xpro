<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 5/30/14
 * Time: 1:59 PM
 * To change this template use File | Settings | File Templates.
 */
class AController extends Controller
{
//    public $layout = '//layouts/admin';
    public $layout = '//layouts/admin_son';
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

//    public function accessRules()
//    {
//        return array(
//            array('allow', // allow authenticated user to perform action login
//                'actions' => array("login"),
//                'users' => array('*'),
//            ),
//            array('allow', // allow authenticated user to perform all actions
//                'expression' => 'Yii::app()->getModule("admin")->isAdmin()',
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
//            ),
//        );
//    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
    //     */
//    public function accessRules()
//    {
//        return array(
//            array('allow', // allow admin user to perform
//                'actions' => array('login'),
//                'users' => array('*')
//            ),
//            array('allow', // allow admin user to perform
//                'actions' => array('*'),
//                'users' => AdminModule::getAdmins()
//            ),
//            array('deny', // deny all users
//                'users' => array('*')
//            ),
//        );
//    }

    public function init()
    {
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('jquery');
        parent::init();
    }

}
