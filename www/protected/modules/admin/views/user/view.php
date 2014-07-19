<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from 192.69.216.111/themes/preview/ace/profile.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 21 Nov 2013 17:36:57 GMT -->
<?php echo $this->renderPartial('/user/_header_user');?>

<body>
<div class="navbar navbar-default" id="navbar">
<script type="text/javascript">
    try{ace.settings.check('navbar' , 'fixed')}catch(e){}
</script>
    <?php echo $this->renderPartial('/layouts/_navbar_container');?>
</div>

<div class="main-container" id="main-container">
<script type="text/javascript">
    try{ace.settings.check('main-container' , 'fixed')}catch(e){}
</script>

<div class="main-container-inner">
<a class="menu-toggler" id="menu-toggler" href="#">
    <span class="menu-text"></span>
</a>

<div class="sidebar" id="sidebar">
<script type="text/javascript">
    try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
</script>

    <?php echo $this->renderPartial('/layouts/_sidebar_shortcuts');?>
    <?php echo $this->renderPartial('/layouts/_nav_list');?>

<div class="sidebar-collapse" id="sidebar-collapse">
    <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
</div>

<script type="text/javascript">
    try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
</script>
</div>

<div class="main-content">
<?php
echo $this->renderPartial('/layouts/_breadcrumbs');
?>
<div class="page-content">
<div class="page-header">
    <h1>
        User Profile Page
        <small>
            <i class="icon-double-angle-right"></i>
            3 styles with inline editable feature
        </small>
    </h1>
</div><!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->

<div class="clearfix">
    <div class="pull-left alert alert-success no-margin">
        <button type="button" class="close" data-dismiss="alert">
            <i class="icon-remove"></i>
        </button>

        <i class="icon-umbrella bigger-120 blue"></i>
        Click on the image below or on profile fields to edit them ...
    </div>

    <div class="pull-right">
        <span class="green middle bolder">Choose profile: &nbsp;</span>

        <div class="btn-toolbar inline middle no-margin">
            <div data-toggle="buttons" class="btn-group no-margin">
                <label class="btn btn-sm btn-yellow active">
                    <span class="bigger-110">1</span>

                    <input type="radio" value="1" />
                </label>

                <label class="btn btn-sm btn-yellow">
                    <span class="bigger-110">2</span>

                    <input type="radio" value="2" />
                </label>

                <label class="btn btn-sm btn-yellow">
                    <span class="bigger-110">3</span>

                    <input type="radio" value="3" />
                </label>
            </div>
        </div>
    </div>
</div>

<div class="hr dotted"></div>

<div>
<div id="user-profile-1" class="user-profile row">
<div class="col-xs-12 col-sm-3 center">
    <div>
												<span class="profile-picture">
													<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/avatars/profile-pic.jpg" />
												</span>

        <div class="space-4"></div>

        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
            <div class="inline position-relative">
                <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-circle light-green middle"></i>
                    &nbsp;
                    <span class="white">Alex M. Doe</span>
                </a>

                <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                    <li class="dropdown-header"> Change Status </li>

                    <li>
                        <a href="#">
                            <i class="icon-circle green"></i>
                            &nbsp;
                            <span class="green">Available</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-circle red"></i>
                            &nbsp;
                            <span class="red">Busy</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-circle grey"></i>
                            &nbsp;
                            <span class="grey">Invisible</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="space-6"></div>

    <div class="profile-contact-info">
        <div class="profile-contact-links align-left">
            <a class="btn btn-link" href="#">
                <i class="icon-plus-sign bigger-120 green"></i>
                Add as a friend
            </a>

            <a class="btn btn-link" href="#">
                <i class="icon-envelope bigger-120 pink"></i>
                Send a message
            </a>

            <a class="btn btn-link" href="#">
                <i class="icon-globe bigger-125 blue"></i>
                www.alexdoe.com
            </a>
        </div>

        <div class="space-6"></div>

        <div class="profile-social-links center">
            <a href="#" class="tooltip-info" title="" data-original-title="Visit my Facebook">
                <i class="middle icon-facebook-sign icon-2x blue"></i>
            </a>

            <a href="#" class="tooltip-info" title="" data-original-title="Visit my Twitter">
                <i class="middle icon-twitter-sign icon-2x light-blue"></i>
            </a>

            <a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
                <i class="middle icon-pinterest-sign icon-2x red"></i>
            </a>
        </div>
    </div>

    <div class="hr hr12 dotted"></div>

    <div class="clearfix">
        <div class="grid2">
            <span class="bigger-175 blue">25</span>

            <br />
            Followers
        </div>

        <div class="grid2">
            <span class="bigger-175 blue">12</span>

            <br />
            Following
        </div>
    </div>

    <div class="hr hr16 dotted"></div>
</div>

<div class="col-xs-12 col-sm-9">
<div class="center">
												<span class="btn btn-app btn-sm btn-light no-hover">
													<span class="line-height-1 bigger-170 blue"> 1,411 </span>

													<br />
													<span class="line-height-1 smaller-90"> Views </span>
												</span>

												<span class="btn btn-app btn-sm btn-yellow no-hover">
													<span class="line-height-1 bigger-170"> 32 </span>

													<br />
													<span class="line-height-1 smaller-90"> Followers </span>
												</span>

												<span class="btn btn-app btn-sm btn-pink no-hover">
													<span class="line-height-1 bigger-170"> 4 </span>

													<br />
													<span class="line-height-1 smaller-90"> Projects </span>
												</span>

												<span class="btn btn-app btn-sm btn-grey no-hover">
													<span class="line-height-1 bigger-170"> 23 </span>

													<br />
													<span class="line-height-1 smaller-90"> Reviews </span>
												</span>

												<span class="btn btn-app btn-sm btn-success no-hover">
													<span class="line-height-1 bigger-170"> 7 </span>

													<br />
													<span class="line-height-1 smaller-90"> Albums </span>
												</span>

												<span class="btn btn-app btn-sm btn-primary no-hover">
													<span class="line-height-1 bigger-170"> 55 </span>

													<br />
													<span class="line-height-1 smaller-90"> Contacts </span>
												</span>
</div>

<div class="space-12"></div>

<div class="profile-user-info profile-user-info-striped">
    <div class="profile-info-row">
        <div class="profile-info-name"> Username </div>

        <div class="profile-info-value">
            <span class="editable" id="username">alexdoe</span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Location </div>

        <div class="profile-info-value">
            <i class="icon-map-marker light-orange bigger-110"></i>
            <span class="editable" id="country">Netherlands</span>
            <span class="editable" id="city">Amsterdam</span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Age </div>

        <div class="profile-info-value">
            <span class="editable" id="age">38</span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Joined </div>

        <div class="profile-info-value">
            <span class="editable" id="signup">20/06/2010</span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> Last Online </div>

        <div class="profile-info-value">
            <span class="editable" id="login">3 hours ago</span>
        </div>
    </div>

    <div class="profile-info-row">
        <div class="profile-info-name"> About Me </div>

        <div class="profile-info-value">
            <span class="editable" id="about">Editable as WYSIWYG</span>
        </div>
    </div>
</div>

<div class="space-20"></div>

<div class="widget-box transparent">
<div class="widget-header widget-header-small">
    <h4 class="blue smaller">
        <i class="icon-rss orange"></i>
        Recent Activities
    </h4>

    <div class="widget-toolbar action-buttons">
        <a href="#" data-action="reload">
            <i class="icon-refresh blue"></i>
        </a>

        &nbsp;
        <a href="#" class="pink">
            <i class="icon-trash"></i>
        </a>
    </div>
</div>

<div class="widget-body">
<div class="widget-main padding-8">
<div id="profile-feed-1" class="profile-feed">
<div class="profile-activity clearfix">
    <div>
        <img class="pull-left" alt="Alex Doe's avatar" src="assets/avatars/avatar5.png" />
        <a class="user" href="#"> Alex Doe </a>
        changed his profile photo.
        <a href="#">Take a look</a>

        <div class="time">
            <i class="icon-time bigger-110"></i>
            an hour ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>

<div class="profile-activity clearfix">
    <div>
        <img class="pull-left" alt="Susan Smith's avatar" src="assets/avatars/avatar1.png" />
        <a class="user" href="#"> Susan Smith </a>

        is now friends with Alex Doe.
        <div class="time">
            <i class="icon-time bigger-110"></i>
            2 hours ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>

<div class="profile-activity clearfix">
    <div>
        <i class="pull-left thumbicon icon-ok btn-success no-hover"></i>
        <a class="user" href="#"> Alex Doe </a>
        joined
        <a href="#">Country Music</a>

        group.
        <div class="time">
            <i class="icon-time bigger-110"></i>
            5 hours ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>

<div class="profile-activity clearfix">
    <div>
        <i class="pull-left thumbicon icon-picture btn-info no-hover"></i>
        <a class="user" href="#"> Alex Doe </a>
        uploaded a new photo.
        <a href="#">Take a look</a>

        <div class="time">
            <i class="icon-time bigger-110"></i>
            5 hours ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>

<div class="profile-activity clearfix">
    <div>
        <img class="pull-left" alt="David Palms's avatar" src="assets/avatars/avatar4.png" />
        <a class="user" href="#"> David Palms </a>

        left a comment on Alex's wall.
        <div class="time">
            <i class="icon-time bigger-110"></i>
            8 hours ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>

<div class="profile-activity clearfix">
    <div>
        <i class="pull-left thumbicon icon-edit btn-pink no-hover"></i>
        <a class="user" href="#"> Alex Doe </a>
        published a new blog post.
        <a href="#">Read now</a>

        <div class="time">
            <i class="icon-time bigger-110"></i>
            11 hours ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>

<div class="profile-activity clearfix">
    <div>
        <img class="pull-left" alt="Alex Doe's avatar" src="assets/avatars/avatar5.png" />
        <a class="user" href="#"> Alex Doe </a>

        upgraded his skills.
        <div class="time">
            <i class="icon-time bigger-110"></i>
            12 hours ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>

<div class="profile-activity clearfix">
    <div>
        <i class="pull-left thumbicon icon-key btn-info no-hover"></i>
        <a class="user" href="#"> Alex Doe </a>

        logged in.
        <div class="time">
            <i class="icon-time bigger-110"></i>
            12 hours ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>

<div class="profile-activity clearfix">
    <div>
        <i class="pull-left thumbicon icon-off btn-inverse no-hover"></i>
        <a class="user" href="#"> Alex Doe </a>

        logged out.
        <div class="time">
            <i class="icon-time bigger-110"></i>
            16 hours ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>

<div class="profile-activity clearfix">
    <div>
        <i class="pull-left thumbicon icon-key btn-info no-hover"></i>
        <a class="user" href="#"> Alex Doe </a>

        logged in.
        <div class="time">
            <i class="icon-time bigger-110"></i>
            16 hours ago
        </div>
    </div>

    <div class="tools action-buttons">
        <a href="#" class="blue">
            <i class="icon-pencil bigger-125"></i>
        </a>

        <a href="#" class="red">
            <i class="icon-remove bigger-125"></i>
        </a>
    </div>
</div>
</div>
</div>
</div>
</div>

<div class="hr hr2 hr-double"></div>

<div class="space-6"></div>

<div class="center">
    <a href="#" class="btn btn-sm btn-primary">
        <i class="icon-rss bigger-150 middle"></i>
        <span class="bigger-110">View more activities</span>

        <i class="icon-on-right icon-arrow-right"></i>
    </a>
</div>
</div>
</div>
</div>
<?php echo $this->renderPartial('/user/_user_profile_2');?>
<?php echo $this->renderPartial('/user/_user_profile_3');?>
<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div><!-- /.main-content -->

<div class="ace-settings-container" id="ace-settings-container">
    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
        <i class="icon-cog bigger-150"></i>
    </div>

    <div class="ace-settings-box" id="ace-settings-box">
        <div>
            <div class="pull-left">
                <select id="skin-colorpicker" class="hide">
                    <option data-skin="default" value="#438EB9">#438EB9</option>
                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                </select>
            </div>
            <span>&nbsp; Choose Skin</span>
        </div>

        <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
        </div>

        <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
        </div>

        <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
        </div>

        <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
        </div>

        <div>
            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
            <label class="lbl" for="ace-settings-add-container">
                Inside
                <b>.container</b>
            </label>
        </div>
    </div>
</div><!-- /#ace-settings-container -->
</div><!-- /.main-container-inner -->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/excanvas.min.js"></script>
<![endif]-->

<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/jquery.gritter.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/bootbox.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/jquery.easy-pie-chart.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/jquery.hotkeys.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/select2.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/fuelux/fuelux.spinner.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/x-editable/bootstrap-editable.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/x-editable/ace-editable.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/jquery.maskedinput.min.js"></script>

<!-- ace scripts -->

<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/sexy-elements.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/sexy.min.js"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">
jQuery(function($) {

    //editables on first profile page
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editableform.loading = "<div class='editableform-loading'><i class='light-blue icon-2x icon-spinner icon-spin'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="icon-ok icon-white"></i></button>'+
        '<button type="button" class="btn editable-cancel"><i class="icon-remove"></i></button>';

    //editables
    $('#username').editable({
        type: 'text',
        name: 'username'
    });


    var countries = [];
    $.each({ "CA": "Canada", "IN": "India", "NL": "Netherlands", "TR": "Turkey", "US": "United States"}, function(k, v) {
        countries.push({id: k, text: v});
    });

    var cities = [];
    cities["CA"] = [];
    $.each(["Toronto", "Ottawa", "Calgary", "Vancouver"] , function(k, v){
        cities["CA"].push({id: v, text: v});
    });
    cities["IN"] = [];
    $.each(["Delhi", "Mumbai", "Bangalore"] , function(k, v){
        cities["IN"].push({id: v, text: v});
    });
    cities["NL"] = [];
    $.each(["Amsterdam", "Rotterdam", "The Hague"] , function(k, v){
        cities["NL"].push({id: v, text: v});
    });
    cities["TR"] = [];
    $.each(["Ankara", "Istanbul", "Izmir"] , function(k, v){
        cities["TR"].push({id: v, text: v});
    });
    cities["US"] = [];
    $.each(["New York", "Miami", "Los Angeles", "Chicago", "Wysconsin"] , function(k, v){
        cities["US"].push({id: v, text: v});
    });

    var currentValue = "NL";
    $('#country').editable({
        type: 'select2',
        value : 'NL',
        source: countries,
        success: function(response, newValue) {
            if(currentValue == newValue) return;
            currentValue = newValue;

            var new_source = (!newValue || newValue == "") ? [] : cities[newValue];

            //the destroy method is causing errors in x-editable v1.4.6
            //it worked fine in v1.4.5
            /**
             $('#city').editable('destroy').editable({
							type: 'select2',
							source: new_source
						}).editable('setValue', null);
             */

            //so we remove it altogether and create a new element
            var city = $('#city').removeAttr('id').get(0);
            $(city).clone().attr('id', 'city').text('Select City').editable({
                type: 'select2',
                value : null,
                source: new_source
            }).insertAfter(city);//insert it after previous instance
            $(city).remove();//remove previous instance

        }
    });

    $('#city').editable({
        type: 'select2',
        value : 'Amsterdam',
        source: cities[currentValue]
    });



    $('#signup').editable({
        type: 'date',
        format: 'yyyy-mm-dd',
        viewformat: 'dd/mm/yyyy',
        datepicker: {
            weekStart: 1
        }
    });

    $('#age').editable({
        type: 'spinner',
        name : 'age',
        spinner : {
            min : 16, max:99, step:1
        }
    });

    //var $range = document.createElement("INPUT");
    //$range.type = 'range';
    $('#login').editable({
        type: 'slider',//$range.type == 'range' ? 'range' : 'slider',
        name : 'login',
        slider : {
            min : 1, max:50, width:100
        },
        success: function(response, newValue) {
            if(parseInt(newValue) == 1)
                $(this).html(newValue + " hour ago");
            else $(this).html(newValue + " hours ago");
        }
    });

    $('#about').editable({
        mode: 'inline',
        type: 'wysiwyg',
        name : 'about',
        wysiwyg : {
            //css : {'max-width':'300px'}
        },
        success: function(response, newValue) {
        }
    });



    // *** editable avatar *** //
    try {//ie8 throws some harmless exception, so let's catch it

        //it seems that editable plugin calls appendChild, and as Image doesn't have it, it causes errors on IE at unpredicted points
        //so let's have a fake appendChild for it!
        if( /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ) Image.prototype.appendChild = function(el){}

        var last_gritter
        $('#avatar').editable({
            type: 'image',
            name: 'avatar',
            value: null,
            image: {
                //specify ace file input plugin's options here
                btn_choose: 'Change Avatar',
                droppable: true,
                /**
                 //this will override the default before_change that only accepts image files
                 before_change: function(files, dropped) {
								return true;
							},
                 */

                //and a few extra ones here
                name: 'avatar',//put the field name here as well, will be used inside the custom plugin
                max_size: 110000,//~100Kb
                on_error : function(code) {//on_error function will be called when the selected file has a problem
                    if(last_gritter) $.gritter.remove(last_gritter);
                    if(code == 1) {//file format error
                        last_gritter = $.gritter.add({
                            title: 'File is not an image!',
                            text: 'Please choose a jpg|gif|png image!',
                            class_name: 'gritter-error gritter-center'
                        });
                    } else if(code == 2) {//file size rror
                        last_gritter = $.gritter.add({
                            title: 'File too big!',
                            text: 'Image size should not exceed 100Kb!',
                            class_name: 'gritter-error gritter-center'
                        });
                    }
                    else {//other error
                    }
                },
                on_success : function() {
                    $.gritter.removeAll();
                }
            },
            url: function(params) {
                // ***UPDATE AVATAR HERE*** //
                //You can replace the contents of this function with examples/profile-avatar-update.js for actual upload


                var deferred = new $.Deferred

                //if value is empty, means no valid files were selected
                //but it may still be submitted by the plugin, because "" (empty string) is different from previous non-empty value whatever it was
                //so we return just here to prevent problems
                var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
                if(!value || value.length == 0) {
                    deferred.resolve();
                    return deferred.promise();
                }


                //dummy upload
                setTimeout(function(){
                    if("FileReader" in window) {
                        //for browsers that have a thumbnail of selected image
                        var thumb = $('#avatar').next().find('img').data('thumb');
                        if(thumb) $('#avatar').get(0).src = thumb;
                    }

                    deferred.resolve({'status':'OK'});

                    if(last_gritter) $.gritter.remove(last_gritter);
                    last_gritter = $.gritter.add({
                        title: 'Avatar Updated!',
                        text: 'Uploading to server can be easily implemented. A working example is included with the template.',
                        class_name: 'gritter-info gritter-center'
                    });

                } , parseInt(Math.random() * 800 + 800))

                return deferred.promise();
            },

            success: function(response, newValue) {
            }
        })
    }catch(e) {}



    //another option is using modals
    $('#avatar2').on('click', function(){
        var modal =
            '<div class="modal hide fade">\
                <div class="modal-header">\
                    <button type="button" class="close" data-dismiss="modal">&times;</button>\
                    <h4 class="blue">Change Avatar</h4>\
                </div>\
                \
                <form class="no-margin">\
                <div class="modal-body">\
                    <div class="space-4"></div>\
                    <div style="width:75%;margin-left:12%;"><input type="file" name="file-input" /></div>\
                </div>\
                \
                <div class="modal-footer center">\
                    <button type="submit" class="btn btn-small btn-success"><i class="icon-ok"></i> Submit</button>\
                    <button type="button" class="btn btn-small" data-dismiss="modal"><i class="icon-remove"></i> Cancel</button>\
                </div>\
                </form>\
            </div>';


        var modal = $(modal);
        modal.modal("show").on("hidden", function(){
            modal.remove();
        });

        var working = false;

        var form = modal.find('form:eq(0)');
        var file = form.find('input[type=file]').eq(0);
        file.ace_file_input({
            style:'well',
            btn_choose:'Click to choose new avatar',
            btn_change:null,
            no_icon:'icon-picture',
            thumbnail:'small',
            before_remove: function() {
                //don't remove/reset files while being uploaded
                return !working;
            },
            before_change: function(files, dropped) {
                var file = files[0];
                if(typeof file === "string") {
                    //file is just a file name here (in browsers that don't support FileReader API)
                    if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
                }
                else {//file is a File object
                    var type = $.trim(file.type);
                    if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
                        || ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
                        ) return false;

                    if( file.size > 110000 ) {//~100Kb
                        return false;
                    }
                }

                return true;
            }
        });

        form.on('submit', function(){
            if(!file.data('ace_input_files')) return false;

            file.ace_file_input('disable');
            form.find('button').attr('disabled', 'disabled');
            form.find('.modal-body').append("<div class='center'><i class='icon-spinner icon-spin bigger-150 orange'></i></div>");

            var deferred = new $.Deferred;
            working = true;
            deferred.done(function() {
                form.find('button').removeAttr('disabled');
                form.find('input[type=file]').ace_file_input('enable');
                form.find('.modal-body > :last-child').remove();

                modal.modal("hide");

                var thumb = file.next().find('img').data('thumb');
                if(thumb) $('#avatar2').get(0).src = thumb;

                working = false;
            });


            setTimeout(function(){
                deferred.resolve();
            } , parseInt(Math.random() * 800 + 800));

            return false;
        });

    });



    //////////////////////////////
    $('#profile-feed-1').slimScroll({
        height: '250px',
        alwaysVisible : true
    });

    $('.profile-social-links > a').tooltip();

    $('.easy-pie-chart.percentage').each(function(){
        var barColor = $(this).data('color') || '#555';
        var trackColor = '#E2E2E2';
        var size = parseInt($(this).data('size')) || 72;
        $(this).easyPieChart({
            barColor: barColor,
            trackColor: trackColor,
            scaleColor: false,
            lineCap: 'butt',
            lineWidth: parseInt(size/10),
            animate:false,
            size: size
        }).css('color', barColor);
    });

    ///////////////////////////////////////////

    //show the user info on right or left depending on its position
    $('#user-profile-2 .memberdiv').on('mouseenter', function(){
        var $this = $(this);
        var $parent = $this.closest('.tab-pane');

        var off1 = $parent.offset();
        var w1 = $parent.width();

        var off2 = $this.offset();
        var w2 = $this.width();

        var place = 'left';
        if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) place = 'right';

        $this.find('.popover').removeClass('right left').addClass(place);
    }).on('click', function() {
            return false;
        });


    ///////////////////////////////////////////
    $('#user-profile-3')
        .find('input[type=file]').ace_file_input({
            style:'well',
            btn_choose:'Change avatar',
            btn_change:null,
            no_icon:'icon-picture',
            thumbnail:'large',
            droppable:true,
            before_change: function(files, dropped) {
                var file = files[0];
                if(typeof file === "string") {//files is just a file name here (in browsers that don't support FileReader API)
                    if(! (/\.(jpe?g|png|gif)$/i).test(file) ) return false;
                }
                else {//file is a File object
                    var type = $.trim(file.type);
                    if( ( type.length > 0 && ! (/^image\/(jpe?g|png|gif)$/i).test(type) )
                        || ( type.length == 0 && ! (/\.(jpe?g|png|gif)$/i).test(file.name) )//for android default browser!
                        ) return false;

                    if( file.size > 110000 ) {//~100Kb
                        return false;
                    }
                }

                return true;
            }
        })
        .end().find('button[type=reset]').on(ace.click_event, function(){
            $('#user-profile-3 input[type=file]').ace_file_input('reset_input');
        })
        .end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
            $(this).prev().focus();
        })
    $('.input-mask-phone').mask('(999) 999-9999');



    ////////////////////
    //change profile
    $('[data-toggle="buttons"] .btn').on('click', function(e){
        var target = $(this).find('input[type=radio]');
        var which = parseInt(target.val());
        $('.user-profile').parent().addClass('hide');
        $('#user-profile-'+which).parent().removeClass('hide');
    });
});
</script>
</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/profile.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 21 Nov 2013 17:37:00 GMT -->
</html>
