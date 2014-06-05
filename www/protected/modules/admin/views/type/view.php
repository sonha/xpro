<?php
/**
 * Created by JetBrains PhpStorm.
 * User: long
 * Date: 2/27/14
 * Time: 6:02 PM
 * To change this template use File | Settings | File Templates.
 */
 echo "id:"."".$model->id."<br>";
 echo "type_name:"." ".$model->type_name."<br>";
?>
<a href="<?php echo $this->createUrl('type/edit',array("id"=>$model->id)); ?>">edit</a>