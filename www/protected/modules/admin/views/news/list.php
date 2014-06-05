<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */

//var_dump($all);die;

$this->menu=array(
    array('label'=>'Create News', 'url'=>array('create')),
    array('label'=>'Manage News', 'url'=>array('admin')),
);
?>
<?php // echo count($all) ?>

<div class="row">
    <div class="col-md-3">
        <?php $this->renderPartial('//news/all_list_category', array('all_categories' => $all_categories, 'catid'=> $catid)); ?>
    </div>
    <div class="col-md-9">
        <ul class="lstNews rs">
            <?php foreach($list as $key => $value){
                ?>
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
                ?>
                <?php if($key == 0){?>
                    <li class="row hightLight <?php echo $item; ?>">
                        <div class="col-md-4">
                            <div  class="thumbnail">
                                <a href="<?php echo $urlBase ?>" title="<?echo $value->title?>" class="thumbnail-inner">
                                    <img class="img-responsive" src="<?php echo $thumb ?>" alt="<?php echo $value->title?>" width="200" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class="title"><a href="<?php echo $urlBase ?>" title="<?echo $value->title ?>"><?php echo $value->title ?></a></h4>
                            <div class="row">
                                <p class="pubDate col-md-4 col-xs-4 col-sm-4"><span class="glyphicon glyphicon-calendar"></span><?php echo date("d-m-Y",(strtotime($value->pub_time))) ?></p>
                                <p class="author col-md-4 col-xs-4 col-sm-4"><span class="glyphicon glyphicon-user"></span><?php echo $value->user->display_name; ?></p>
<!--                                <p class="category col-md-4 col-xs-4 col-sm-4">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <a href="" title="<?php /*echo $value->cat->title_cat; */?>"><?php /*echo $value->cat->title_cat; */?></a>
                                </p>-->
                            </div>
                            <p class="summaryContent cf">
                                <?php
                                if(strlen($value->content) > 200){
                                    echo mb_substr($value->content,0,200,'UTF-8').'...';
                                }
                                ?>
                            </p>
                            <a class="btn btn-primary" href="<?php echo $urlBase ?>" title="<?php echo $value->title?>" >Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </li>
                <?php }else { ?>
                    <li class="row <?php echo $item; ?>">
                        <div class="col-md-2">
                            <div  class="thumbnail">
                                <a href="<?php echo $urlBase ?>" title="<?echo $value->title?>" class="thumbnail-inner">
                                    <img class="img-responsive" src="<?php echo $thumb ?>" alt="<?php echo $value->title?>" width="200" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h4 class="title"><a href="<?php echo $urlBase ?>" title="<?php echo $value['title']?>"><?php echo $value->title ?></a></h4>
                            <div class="row">
                                <p class="pubDate col-md-4 col-xs-4 col-sm-4"><span class="glyphicon glyphicon-calendar"></span><?php echo date("d-m-Y",(strtotime($value->pub_time))) ?></p>
                                <p class="author col-md-4 col-xs-4 col-sm-4"><span class="glyphicon glyphicon-user"></span><?php echo $value->user->display_name; ?></p>
                                <!--<p class="category col-md-4 col-xs-4 col-sm-4"><span class="glyphicon glyphicon-folder-open"></span><a href="" title="<?php /*echo $value->cat->title_cat; */?>"><?php /*echo $value->cat->title_cat; */?></a></p>-->
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
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>


<?php
/*    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
    ));
*/?>

