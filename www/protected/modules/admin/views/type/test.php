    <div class="modal-body no-padding">
        <table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
            <thead>
            <tr>
                <th>id</th>
                <th>type_name</th>
                <!--                            <th>Clicks</th>-->
                <!---->
                <!--                            <th>-->
                <!--                                <i class="icon-time bigger-110"></i>-->
                <!--                                Update-->
                <!--                            </th>-->
                <th>

                </th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($list_model as $key =>$value){ ?>
                <?php $value=(object)$value; ?>
                <tr>
                    <td>
                        <a href="#"><?php echo $value->id ?></a>
                    </td>
                    <td><?php echo $value->type_name ?></td>
                    <!--                            <td>3,330</td>-->
                    <!--                            <td>Feb 12</td>-->
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

                        <!--                                    <div class="visible-xs visible-sm hidden-md hidden-lg">-->
                        <!--                                        <div class="inline position-relative">-->
                        <!--                                            <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">-->
                        <!--                                                <i class="icon-cog icon-only bigger-110"></i>-->
                        <!--                                            </button>-->
                        <!---->
                        <!--                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">-->
                        <!--                                                <li>-->
                        <!--                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">-->
                        <!--																				<span class="blue">-->
                        <!--																					<i class="icon-zoom-in bigger-120"></i>-->
                        <!--																				</span>-->
                        <!--                                                    </a>-->
                        <!--                                                </li>-->
                        <!---->
                        <!--                                                <li>-->
                        <!--                                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">-->
                        <!--																				<span class="green">-->
                        <!--																					<i class="icon-edit bigger-120"></i>-->
                        <!--																				</span>-->
                        <!--                                                    </a>-->
                        <!--                                                </li>-->
                        <!---->
                        <!--                                                <li>-->
                        <!--                                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">-->
                        <!--																				<span class="red">-->
                        <!--																					<i class="icon-trash bigger-120"></i>-->
                        <!--																				</span>-->
                        <!--                                                    </a>-->
                        <!--                                                </li>-->
                        <!--                                            </ul>-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->
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
                        <a class="page" href="javascript:void(0)"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
            <?php } ?>


            <!--                        <li class="active">-->
            <!--                            <a href="#">1</a>-->
            <!--                        </li>-->
            <!---->
            <!--                        <li>-->
            <!--                            <a href="#">2</a>-->
            <!--                        </li>-->
            <!---->
            <!--                        <li>-->
            <!--                            <a href="#">3</a>-->
            <!--                        </li>-->

            <li class="next">
                <a href="#">
                    <i class="icon-double-angle-right"></i>
                </a>
            </li>
        </ul>
    </div>
