<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

//var_dump($all);die;

$this->menu=array(
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>

<div class="row">
    <ul class="bxslider">
        <li><a href="" title="Huydzo"><img src="http://genk2.vcmedia.vn/HFLZk9aryY5fqdC2HFsekZiBigmty/Image/2014/05/064-a6820.jpg" title="Huydzo" width="" /></a></li>
        <li><a href="" title="Huydzo"><img src="http://genk2.vcmedia.vn/HFLZk9aryY5fqdC2HFsekZiBigmty/Image/2014/04/25-26-69f01.jpg" title="Huydzo" width="" /></a></li>
        <li><a href="" title="Huydzo"><img src="http://genk2.vcmedia.vn/HFLZk9aryY5fqdC2HFsekZiBigmty/Image/2014/05/064-a6820.jpg" title="Huydzo" width="" /></a></li>
        <li><a href="" title="Huydzo"><img src="http://genk2.vcmedia.vn/dTUDlvZ9Pm5DNNPFeHeiGmyg5Bq4ag/Image/2014/04/lj0415cos04-a80bb.jpg" title="Huydzo" width="" /></a></li>
        <li><a href="" title="Huydzo"><img src="http://genk2.vcmedia.vn/HFLZk9aryY5fqdC2HFsekZiBigmty/Image/2014/05/064-a6820.jpg" title="Huydzo" width="" /></a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-3">
        <?php $this->renderPartial('//news/all_list_category', array('all_categories' => $all_categories)); ?>
    </div>
    <div class="col-md-9">
        <div class="rs">
            <!--List News Block-->
            <?php foreach ($all_categories as $key => $value_cat){
                ?>
                <div class="homeBlock panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a href="<?php echo $this->createUrl('news/list',array('catid'=> $value_cat->in)) ?>" title="<?php echo $value_cat->title_cat ?>"><?php echo $value_cat->title_cat ?></a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="newsBlock rs cf">
                            <?php
                                //Get All News by Category
                            $newsByCat= News::getAllNewsByCategory($value_cat->in,5);
                                foreach($newsByCat as $key => $value){?>
                                    <?php $urlBase =  $this->createUrl('news/detailNews',array('idNews'=> $value->id)); ?>
                                    <?php
                                        //Add Clash 'odd' and 'even' on row
                                        if($key % 2 == 0){
                                            $item = 'odd';
                                        }else{
                                            $item = 'even';
                                        }

                                        //Set img Thumbnail default
                                        $thumb = $value->thumb;
                                        if($thumb == null){
                                            $thumb = 'http://www.whatmobile.net/wp-content/themes/Ciola/library/images/thumbnail-600x350.png" ';
                                        }
                                    //var_dump($value);die;
                                    ?>
                            <?php if($key == 0){?>
                                <div class="bigNews">
                                    <h4 class="title"><a href="<?php echo $urlBase ?>" title="<?php echo $value->title ?>"><?php echo $value->title ?></a></h4>
                                    <div class="row">
                                        <p class="pubDate col-md-4 col-xs-4 col-sm-4"><span class="glyphicon glyphicon-calendar"></span><?php echo date("d-m-Y",(strtotime($value->pub_time))); ?></p>
                                        <p class="author col-md-4 col-xs-4 col-sm-4"><span class="glyphicon glyphicon-user"></span><?php echo $value->user->display_name; ?></p>
                                        <p class="category col-md-4 col-xs-4 col-sm-4">
                                            <span class="glyphicon glyphicon-folder-open"></span>
                                            <a href="<?php echo $this->createUrl('news/list',array('catid'=> $value_cat->in)) ?>" title="<?php echo $value->cat->title_cat; ?>"><?php echo $value->cat->title_cat; ?></a>
                                        </p>
                                    </div>
                                    <div  class="thumbnail">
                                        <a href="<?php echo $urlBase ?>" title="<?echo $value->title?>" class="thumbnail-inner">
                                            <img class="img-responsive" src="<?php echo $thumb ?>" alt="<?echo $value->title?>" width="300" />
                                        </a>
                                    </div>
                                    <p class="summaryContent cf">
                                        <?php
                                        if(strlen($value->content) > 150){
                                            echo mb_substr($value->content,0,150,'UTF-8').'...';
                                        }
                                        ?>
                                    </p>
                                    <a class="btn btn-primary" href="<?php echo $urlBase ?>" title="<?echo $value->title?>" >Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                            <ul class="lstRelateNews">
                                <?php }else{ ?>
                                        <li>
                                            <a href="<?php echo $this->createUrl('news/detailNews',array('idNews'=> $value->id)) ?>" title="<?php echo $value->title ?>" >
                                                <?php echo $value->title ?>
                                            </a>
                                        </li>
                                     <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>


<?php
/*    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    ));
*/?>

