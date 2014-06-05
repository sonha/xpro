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

<form class="form-horizontal" role="form">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Text Field </label>

        <div class="col-sm-9">
            <input type="text" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" />
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Password Field </label>

        <div class="col-sm-9">
            <input type="password" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5" />
											<span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">Inline help text</span>
											</span>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Readonly field </label>

        <div class="col-sm-9">
            <input readonly="" type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" value="This text field is readonly!" />
											<span class="help-inline col-xs-12 col-sm-7">
												<label class="middle">
                                                    <input class="ace" type="checkbox" id="id-disable-check" />
                                                    <span class="lbl"> Disable it!</span>
                                                </label>
											</span>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Relative Sizing</label>

        <div class="col-sm-9">
            <input class="input-sm" type="text" id="form-field-4" placeholder=".input-sm" />
            <div class="space-2"></div>

            <div class="help-block" id="input-size-slider"></div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-5">Grid Sizing</label>

        <div class="col-sm-9">
            <div class="clearfix">
                <input class="col-xs-1" type="text" id="form-field-5" placeholder=".col-xs-1" />
            </div>

            <div class="space-2"></div>

            <div class="help-block" id="input-span-slider"></div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right">Input with Icon</label>

        <div class="col-sm-9">
											<span class="input-icon">
												<input type="text" id="form-field-icon-1" />
												<i class="icon-leaf blue"></i>
											</span>

											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" />
												<i class="icon-leaf green"></i>
											</span>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-6">Tooltip and help button</label>

        <div class="col-sm-9">
            <input data-rel="tooltip" type="text" id="form-field-6" placeholder="Tooltip on hover" title="Hello Tooltip!" data-placement="bottom" />
            <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="More details." title="Popover on hover">?</span>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-tags">Tag input</label>

        <div class="col-sm-9">
            <input type="text" name="tags" id="form-field-tags" value="Tag Input Control" placeholder="Enter tags ..." />
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-info" type="button">
                <i class="icon-ok bigger-110"></i>
                Submit
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


<div id="modal-form" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Please fill the following form fields</h4>
            </div>

            <div class="modal-body overflow-visible">
                <div class="row">
                    <div class="col-xs-12 col-sm-5">
                        <div class="space"></div>

                        <input type="file" />
                    </div>

                    <div class="col-xs-12 col-sm-7">
                        <div class="form-group">
                            <label for="form-field-select-3">Location</label>

                            <div>
                                <select class="chosen-select" data-placeholder="Choose a Country...">
                                    <option value="">&nbsp;</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label for="form-field-username">Username</label>

                            <div>
                                <input class="input-large" type="text" id="form-field-username" placeholder="Username" value="alexdoe" />
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label for="form-field-first">Name</label>

                            <div>
                                <input class="input-medium" type="text" id="form-field-first" placeholder="First Name" value="Alex" />
                                <input class="input-medium" type="text" id="form-field-last" placeholder="Last Name" value="Doe" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-sm" data-dismiss="modal">
                    <i class="icon-remove"></i>
                    Cancel
                </button>

                <button class="btn btn-sm btn-primary">
                    <i class="icon-ok"></i>
                    Save
                </button>
            </div>
        </div>
    </div>
</div><!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->