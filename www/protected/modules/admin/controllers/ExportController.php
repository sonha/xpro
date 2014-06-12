<?php

class ExportController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/page-list-news';
    public $layout = '//layouts/admin_son';
    public $menuActive = __CLASS__; // lay ten class luon cho menuactive


    public function actionUser(){
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

        $objPHPExcel->getProperties()->setCreator("Ha Anh Son")
            ->setLastModifiedBy("Ha Anh Son")
            ->setTitle("PHPExcel Test Document")
            ->setSubject("Ha Anh Son setSubject")
            ->setDescription("Ha Anh Son setSubject setDescription")
            ->setKeywords("Ha Anh Son setKeywords")
            ->setCategory("Ha Anh Son setCategory");

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B1', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D1', 'world!');

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

        $objPHPExcel->getActiveSheet()->setCellValue('A8',"Hello\nWorld");
        $objPHPExcel->getActiveSheet()->getRowDimension(8)->setRowHeight(-1);
        $objPHPExcel->getActiveSheet()->getStyle('A8')->getAlignment()->setWrapText(true);

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

}
