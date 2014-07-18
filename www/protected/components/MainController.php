<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/18/14
 * Time: 5:04 PM
 * To change this template use File | Settings | File Templates.
 */
class MainController extends Controller {

    public $baseUrl;
    public $keyword = '';
    public $description = "";
    /**
     * Todo: Khoi tao cac bien
     * Author: Son Ha Anh (sonhaanh@vccorp.vn)
     * Create:
     * Update:
     * Output: None
     */
    public function init() {
        $this->baseUrl = Yii::app()->request->getBaseUrl(true);
    }

    /**
     * Todo: Ham lay title cua trang
     * Author: Son Ha Anh (sonhaanh@vccorp.vn)
     * Create:
     * Update:
     * @param string $value
     * Output: None
     */
    public function setPageTitle($value)
    {
        parent::setPageTitle($value . ' - ' . Yii::app()->name);
    }

    /**
     * Custom pagination
     */
    function Paging(CArrayDataProvider $dataProvider, $view = '_item')
    {
        ob_start();
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider' => $dataProvider,
            'enablePagination' => true,
            'itemView' => $view,
            'template' => "{items}\n{pager}",
            'pager' => array(
                'class' => 'bootstrap.widgets.TbPager',
                'alignment' => 'right',
                'nextPageLabel' => 'Tiếp theo',
                'prevPageLabel' => 'Trước',
                'displayFirstAndLast' => true
            )
        ));
        $pagination = ob_get_clean();
        return $pagination;
    }
}