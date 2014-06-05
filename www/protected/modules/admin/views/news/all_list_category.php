<ul class="list-group rs">
    <?php foreach($all_categories as $key => $value){?>
<!--        --><?php
/*            $active="";
            if($value->in == $catid){
                $active = 'active';
            }
        */?>
        <li class="list-group-item <?php /*echo $active */?>">
            <a href="<?php echo $this->createUrl('news/list',array('catid'=> $value->in)) ?>" title="<?php echo $value->title_cat ?>">
                <?php echo $value->title_cat ?>
            </a>
            <?php
            //Get Sub Category
            if($value->parent_id == null) {
                $listSubCat = CHtml::listData(Category::model()->findAll('parent_id ='.$value->in), 'in', 'title_cat'); //table_col_name1 is value of option, table_col_name2 is label of option
                //var_dump($listSubCat);die;
            }
            ?>
            <ul class="subCat">
                <?php foreach ($listSubCat as $i => $valueSubCat){ ?>
                    <li><a href="<?php echo $this->createUrl('news/list',array('catid'=> $i)) ?>" title="<?php echo $valueSubCat; ?>"><?php echo $valueSubCat; ?></a></li>
                <?php } ?>
            </ul>
        </li>
    <?php } ?>
</ul>