<?php
/**
 * @var $model User
 * @var $this UserController
 */
?>
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

            <!--    <div style="color: palevioletred"> Error tip help! </div>-->
            <form class="form-horizontal" role="form" action="<?php echo $this->createUrl('user/update') ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $model->id ?>">
                <!--<div class="form-group">-->
                <!--    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text Field </label>-->
                <!---->
                <!--    <div class="col-sm-9">-->
                <!--        <input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />-->
                <!--    </div>-->
                <!--</div>-->
                <!---->
                <!--<div class="space-4"></div>-->

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> User name </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" placeholder="User name" name="user_name" value="<?php echo $model->username; ?>"  class="col-xs-10 col-sm-5" />
                        <!--											<span class="help-inline col-xs-12 col-sm-7">-->
                        <!--												<span class="middle">Inline help text</span>-->
                        <!--											</span>-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" placeholder="Password" name="pass" value="<?php echo $model->password; ?>"  class="col-xs-10 col-sm-5" />
                        <!--											<span class="help-inline col-xs-12 col-sm-7">-->
                        <!--												<span class="middle">Inline help text</span>-->
                        <!--											</span>-->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Email </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-field-2" placeholder="Email" name="email" value="<?php echo $model->email; ?>"  class="col-xs-10 col-sm-5" />
                        <!--											<span class="help-inline col-xs-12 col-sm-7">-->
                        <!--												<span class="middle">Inline help text</span>-->
                        <!--											</span>-->
                    </div>
                </div>
                <div class="space-4"></div>

                <div class="clearfix form-actions">
                    <div  class="col-md-offset-3 col-md-9">
                        <button  class="btn btn-info" type="submit">
                            <i class="icon-ok bigger-110"></i>
                            update
                        </button>

                        <!--                        &nbsp; &nbsp; &nbsp;-->
                        <!--                        <button class="btn" type="reset">-->
                        <!--                            <i class="icon-undo bigger-110"></i>-->
                        <!--                            Reset-->
                        <!--                        </button>-->
                    </div>
                </div>

                <div class="hr hr-24"></div>

            </form>


            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->