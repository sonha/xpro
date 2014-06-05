<?php
$this->breadcrumbs=array(
	Shop::t('Products'),
);
Shop::renderFlash();
?>

<h2><?php echo Shop::t('Tất cả các sản phẩm'); ?></h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
