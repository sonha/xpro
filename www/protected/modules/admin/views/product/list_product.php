<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">jQuery dataTables</h3>
                    <?php
                    if (Yii::app()->user->hasFlash('del_success')):
                        foreach (Yii::app()->user->getFlashes() as $key => $message) {
                            echo '<div class="help-block " style="color:palevioletred">' . $message . "</div>\n";
                        }
                    endif;?>
                    <div class="table-header">
                        List Products
                    </div>
                    <div class="table-responsive">
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>product_id</th>
                                <th>category_id</th>
                                <th>title</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            foreach ($list_model as $key => $model) {
                                ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo $this->createUrl('product/view', array("id" => $model->product_id)); ?>"><?php echo $model->product_id ?></a>
                                    </td>
                                    <td><?php echo $model->category_id ?></td>
                                    <td><?php echo $model->title ?></td>
                                    <td><?php echo $model->description ?></td>
                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                            <a class="blue"
                                               href="<?php echo $this->createUrl('product/view', array("id" => $model->product_id)); ?>">
                                                <i class="icon-zoom-in bigger-130"></i>
                                            </a>

                                            <a class="green"
                                               href="<?php echo $this->createUrl('product/edit', array("id" => $model->product_id)); ?>">
                                                <i class="icon-pencil bigger-130"></i>
                                            </a>

                                            <a class="red"
                                               href="<?php echo $this->createUrl('product/delete', array("id" => $model->product_id)); ?>">
                                                <i class="icon-trash bigger-130"></i>
                                            </a>
                                        </div>

                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="inline position-relative">
                                                <button class="btn btn-minier btn-yellow dropdown-toggle"
                                                        data-toggle="dropdown">
                                                    <i class="icon-caret-down icon-only bigger-120"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                    <li>
                                                        <a href="<?php echo $this->createUrl('product/view', array("id" => $model->product_id)); ?>"
                                                           class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="icon-zoom-in bigger-120"></i>
																				</span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="<?php echo $this->createUrl('product/edit', array("id" => $model->product_id)); ?>"
                                                           class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="icon-edit bigger-120"></i>
																				</span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="tooltip-error" data-rel="tooltip"
                                                           title="Delete">
																				<span class="red">
																					<i class="icon-trash bigger-120"></i>
																				</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.page-content -->

<!-- basic scripts -->

<!--[if !IE]> -->

<!--<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->

<!-- <![endif]-->

<!--[if IE]>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<![endif]-->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='admin/assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='admin/assets/js/jquery-1.10.2.min.js'>" + "<" + "/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if ("ontouchend" in document) document.write("<script src='admin/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<!--<script src="admin/assets/js/bootstrap.min.js"></script>-->
<!--<script src="admin/assets/js/typeahead-bs2.min.js"></script>-->

<!-- page specific plugin scripts -->

<script src="admin/assets/js/jquery.dataTables.min.js"></script>
<script src="admin/assets/js/jquery.dataTables.bootstrap.js"></script>

<!-- ace scripts -->

<!--<script src="admin/assets/js/sexy-elements.min.js"></script>-->
<!--<script src="admin/assets/js/sexy.min.js"></script>-->

<!-- inline scripts related to this page -->

<script type="text/javascript">
    jQuery(function ($) {
        var oTable1 = $('#sample-table-2').dataTable({
            "aoColumns": [
                { "bSortable": false },
                null,
                { "bSortable": false }
            ] });


        $('table th input:checkbox').on('click', function () {
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function () {
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

        });


        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
            return 'left';
        }
    })
</script>

