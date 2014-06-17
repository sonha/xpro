<?php  ?>
<div class="page-content">
    <div class="page-header">
        <h1>
            Form Elements
            <small>
                <i class="icon-double-angle-right"></i>
                Common form elements and layouts
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <?php
            foreach(Yii::app()->user->getFlashes() as $key => $message) {
                foreach($message as $key2 => $value){
                    echo '<div class="help-block " style="color:palevioletred">' . $value . "</div>\n";
                }
            }
            ?>
            <form class="form-horizontal" id="form_search" role="form" action="<?php echo $this->createUrl('product/admin') ?>" method="post">


                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Id thể loại</label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" placeholder="id" name="product_id" value="<?php if(Utils::getSession('model')!="") echo Utils::getSession('model')->product_id ?>"  class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Tên </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" placeholder="Type name" name="title" value="<?php if(Utils::getSession('model')!="") echo Utils::getSession('model')->title ?>"  class="col-xs-10 col-sm-5" />
                    </div>
                </div>
                <div class="space-4"></div>
                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button  class="btn btn-info" type="submit">
                            <i class="icon-ok bigger-110"></i>
                            Search
                        </button>

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="icon-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>

                <div class="hr hr-24"></div>

            </form>

            <div class="modal-content">
                <div class="modal-body no-padding">
                    <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                        <thead>
                        <tr>
                            <th>product_id</th>
                            <th>title</th>
                            <th>price</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach($list_model as $key =>$value){ ?>
                        <?php $value=(object)$value; ?>
                            <tr>
                                <td>
                                    <a href="#"><?php echo $value->product_id ?></a>
                                </td>
                                <td><?php echo $value->title ?></td>
                                <td><?php echo $value->price ?></td>
                                <td>
                                    <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                        <a href="#" class="btn btn-xs btn-success">
                                            <i class="icon-ok bigger-120"></i>
                                        </a>

                                        <a href="#" class="btn btn-xs btn-info">
                                            <i class="icon-edit bigger-120"></i>
                                        </a>

                                        <a href="#" class="btn btn-xs btn-danger">
                                            <i class="icon-trash bigger-120"></i>
                                        </a>

                                        <a href="#" class="btn btn-xs btn-warning">
                                            <i class="icon-flag bigger-120"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>



                        </tbody>
                    </table>
                </div>

                <div class="modal-footer no-margin-top">
                    <ul class="pagination pull-right no-margin">

                        <li class="prev disabled">
                            <a href="#">
                                <i class="icon-double-angle-left"></i>
                            </a>
                        </li>
                        <?php for($i=1;$i<=$pagination['total'];$i++){ ?>
                            <?php if($i==$pagination['page']){ ?>
                                <li class="active">
                                    <a class="page_number" href="#"><?php echo $i; ?></a>
                                </li>
                            <?php }elseif($i>$pagination['page']-4 && $i< $pagination['page'] +4){ ?>
                                <li>
                                    <a class="page"  href="javascript:void(0)"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <li class="next">
                            <a href="#">
                                <i class="icon-double-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.modal-content -->

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
<script type="text/javascript">
    function getList() {
        $(".page").on("click",function(){
            $("#form_search").serialize();
//            alert($(this).get(0).innerHTML);
            var postData= $("#form_search").serialize()+"&page="+$(this).get(0).innerHTML;
           // alert(postData);
            $.ajax({
                data:postData,
                type:"POST",
                //dataType:String,
                url:"<?php echo $this->createUrl("type/AjaxSearch") ?>",
                success:function(data){
                    $(document).ready(function() {
                        $(".modal-content").html(data);
                        $(document).ajaxComplete(getList);
//                        $(".page").on("click",getList);
                    })

                }

            })
        })
    }
    $(document).ready(getList);
    $(document).ajaxComplete(getList);
</script>

