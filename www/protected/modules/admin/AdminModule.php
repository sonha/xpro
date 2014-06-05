<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 5/30/14
 * Time: 1:49 PM
 * To change this template use File | Settings | File Templates.
 */
class AdminModule extends CWebModule
{
    static private $_admin;
    static private $_admins = array();
    static private $_adminByName = array();
    public $debug = false;

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'admin.models.*',
            'admin.components.*',
        ));

        Yii::app()->user->setStateKeyPrefix('_admin');
        Yii::app()->user->setReturnUrl('app'); // Module base return URL
        Yii::app()->user->loginUrl = Yii::app()->baseUrl . '/admin/login'; // Module login URL
//        var_dump(Yii::app()->getModule('admin')->isAdmin());
    }

    public function getBehaviorsFor($componentName)
    {
        if (isset($this->componentBehaviors[$componentName])) {
            return $this->componentBehaviors[$componentName];
        } else {
            return array();
        }
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else
            return false;
    }

    /**
     * @param $str
     * @param $params
     * @param $dic
     * @return string
     */
    public static function t($str = '', $params = array(), $dic = 'admin')
    {
        if (Yii::t("AdminModule", $str) == $str)
            return Yii::t("AdminModule." . $dic, $str, $params);
        else
            return Yii::t("AdminModule", $str, $params);
    }

    /**
     * Return admins.
     * @return array names
     */
    public static function getAdmins()
    {
        if (!self::$_admins) {
            $admins = Administrator::model()->active()->findAll();
            $return_name = array();
            foreach ($admins as $admin)
                array_push($return_name, $admin->username);
            self::$_admins = ($return_name) ? $return_name : array('');
        }
        return self::$_admins;
    }

    /**
     * Return admin status.
     * @return boolean
     */
    public static function isAdmin()
    {
        if (Yii::app()->user->isGuest)
            return false;
        else {
            if (!isset(self::$_admin)) {
                if (self::admin())
                    self::$_admin = true;
                else
                    self::$_admin = false;
            }
            return self::$_admin;
        }
    }

    /**
     * Return safe admin data.
     * @param int $id not required
     * @param bool $clearCache
     * @return bool $user object or false
     */
    public static function admin($id = 0, $clearCache = false)
    {
        if (!$id && !Yii::app()->user->isGuest)
            $id = Yii::app()->user->id;
        if ($id) {
            if (!isset(self::$_admins[$id]) || $clearCache)
                self::$_admins[$id] = Administrator::model()->findbyPk($id);
            return self::$_admins[$id];
        } else return false;
    }
}
