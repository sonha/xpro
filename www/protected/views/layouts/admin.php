<!DOCTYPE html>
<html lang="en">

<?php //var_dump(Yii::app()->request->baseUrl);die;?>
    <!-- Mirrored from 192.69.216.111/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 21 Nov 2013 17:37:01 GMT -->
    <head>
        <meta charset="utf-8" />
        <title><?php
            if (isset($this->pageTitle)) {
                echo $this->pageTitle;
            }
            ?></title>

        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- basic styles -->

        <link href="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/css/jquery.fileupload.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl(true) ?>/css/jquery.fileupload-ui.css" />
        <!--[if IE 7]>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/css/jquery-ui-1.10.3.custom.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/css/chosen.css" />
        <!-- fonts -->

        <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300&subset=latin,vietnamese,latin-ext' rel='stylesheet' type='text/css'>

        <!-- ace styles -->

        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/css/sexy.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/css/sexy-rtl.min.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/css/sexy-skins.min.css" />

        <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/css/sexy-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <!-- ace settings handler -->

        <script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/sexy-extra.min.js"></script>
        <script src="ckeditor/ckeditor.js"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/html5shiv.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl;?>/admin/assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="navbar navbar-default" id="navbar">
            <script type="text/javascript">
                try {
                    ace.settings.check('navbar', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="icon-leaf"></i>
                            Ace Admin
                        </small>
                    </a><!-- /.brand -->
                </div><!-- /.navbar-header -->

                <div class="navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="grey">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-tasks"></i>
                                <span class="badge badge-grey">4</span>
                            </a>

                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="icon-ok"></i>
                                    4 Tasks to complete
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Software Update</span>
                                            <span class="pull-right">65%</span>
                                        </div>

                                        <div class="progress progress-mini ">
                                            <div style="width:65%" class="progress-bar "></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Hardware Upgrade</span>
                                            <span class="pull-right">35%</span>
                                        </div>

                                        <div class="progress progress-mini ">
                                            <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Unit Testing</span>
                                            <span class="pull-right">15%</span>
                                        </div>

                                        <div class="progress progress-mini ">
                                            <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Bug Fixes</span>
                                            <span class="pull-right">90%</span>
                                        </div>

                                        <div class="progress progress-mini progress-striped active">
                                            <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        See tasks with details
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="purple">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-bell-alt icon-animated-bell"></i>
                                <span class="badge badge-important">8</span>
                            </a>

                            <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="icon-warning-sign"></i>
                                    8 Notifications
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-pink icon-comment"></i>
                                                New Comments
                                            </span>
                                            <span class="pull-right badge badge-info">+12</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="btn btn-xs btn-primary icon-user"></i>
                                        Bob just signed up as an editor ...
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-success icon-shopping-cart"></i>
                                                New Orders
                                            </span>
                                            <span class="pull-right badge badge-success">+8</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-info icon-twitter"></i>
                                                Followers
                                            </span>
                                            <span class="pull-right badge badge-info">+11</span>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        See all notifications
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="green">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-envelope icon-animated-vertical"></i>
<!--                                <span class="badge badge-success">                                    -->
<!--                                    --><?php
//                                    if(isset(Utils::getSession("user")->userName)){
//                                        $message = Message::model()->findAll(array("condition" => "`to_userName`="."\"".Utils::getSession("user")->userName."\""." AND `reveicer_deleted`=0"));
//                                        if (count($message) > 0) {
//                                            echo count($message) . " Message(s)";
//                                        }else{
//                                            echo "0 Message";
//                                        }
//                                    }
//
//                                    ?><!--</span>-->
                            </a>

                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="icon-envelope-alt"></i>

                                </li>
                                <?php if(isset($message)) { ?>
                                <?php foreach($message as $row) { ?>
                                
                                <li>
                                    <a href="#"> 
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue"><?php echo $row->from_userName; ?>:</span>
                                                <?php echo substr(Utils::removeHtmlString($row->content),0,50); ?>
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span><?php echo Utils::DateConvert($row->time); ?></span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <?php }}?>
                                <li>
                                    <a href="<?php echo $this->createUrl("message/inbox"); ?>">
                                        See all messages
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
<!--                                <img class="nav-user-photo" src="--><?php
//                                if (Utils::getSession("user") != "") {
//                                    echo Utils::getSession("user")->avatar;
//                                }
//                                ?><!--" alt="Jason's Photo" />-->
<!--                                <span class="user-info">-->
<!--                                    <small>Welcome,</small>-->
<!--                                    --><?php
//                                    if (Utils::getSession("user") != "") {
//                                        echo Utils::getSession("user")->displayName;
//                                    }
//                                    ?>
<!--                                </span>-->

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="icon-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->createUrl("profile/index"); ?>">
                                        <i class="icon-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="<?php echo $this->createUrl("user/logout"); ?>">
                                        <i class="icon-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- /.ace-nav -->
                </div><!-- /.navbar-header -->
            </div><!-- /.container -->
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <div class="main-container-inner">
                <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>

                <div class="sidebar" id="sidebar">
                    <script type="text/javascript">
                        try {
                            ace.settings.check('sidebar', 'fixed')
                        } catch (e) {
                        }
                    </script>

                    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                            <button class="btn btn-success">
                                <i class="icon-signal"></i>
                            </button>

                            <button class="btn btn-info">
                                <i class="icon-pencil"></i>
                            </button>

                            <button class="btn btn-warning">
                                <i class="icon-group"></i>
                            </button>

                            <button class="btn btn-danger">
                                <i class="icon-cogs"></i>
                            </button>
                        </div>

                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                            <span class="btn btn-success"></span>

                            <span class="btn btn-info"></span>

                            <span class="btn btn-warning"></span>

                            <span class="btn btn-danger"></span>
                        </div>
                    </div><!-- #sidebar-shortcuts -->

                    <ul class="nav nav-list">
                        <li>
                            <a href="index.html">
                                <i class="icon-dashboard"></i>
                                <span class="menu-text"> Dashboard </span>
                            </a>
                        </li>

                        <!--                        <li>
                                                    <a href="typography.html">
                                                        <i class="icon-text-width"></i>
                                                        <span class="menu-text"> Typography </span>
                                                    </a>
                                                </li>-->

                        <!--                        <li>
                                                    <a href="#" class="dropdown-toggle">
                                                        <i class="icon-desktop"></i>
                                                        <span class="menu-text"> UI Elements </span>
                        
                                                        <b class="arrow icon-angle-down"></b>
                                                    </a>
                        
                                                    <ul class="submenu">
                                                        <li>
                                                            <a href="elements.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Elements
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="buttons.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Buttons &amp; Icons
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="treeview.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Treeview
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="jquery-ui.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                jQuery UI
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="nestable-list.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Nestable Lists
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="#" class="dropdown-toggle">
                                                                <i class="icon-double-angle-right"></i>
                        
                                                                Three Level Menu
                                                                <b class="arrow icon-angle-down"></b>
                                                            </a>
                        
                                                            <ul class="submenu">
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="icon-leaf"></i>
                                                                        Item #1
                                                                    </a>
                                                                </li>
                        
                                                                <li>
                                                                    <a href="#" class="dropdown-toggle">
                                                                        <i class="icon-pencil"></i>
                        
                                                                        4th level
                                                                        <b class="arrow icon-angle-down"></b>
                                                                    </a>
                        
                                                                    <ul class="submenu">
                                                                        <li>
                                                                            <a href="#">
                                                                                <i class="icon-plus"></i>
                                                                                Add Product
                                                                            </a>
                                                                        </li>
                        
                                                                        <li>
                                                                            <a href="#">
                                                                                <i class="icon-eye-open"></i>
                                                                                View Products
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>-->

                        <!--                        <li>
                                                    <a href="#" class="dropdown-toggle">
                                                        <i class="icon-list"></i>
                                                        <span class="menu-text"> Tables </span>
                        
                                                        <b class="arrow icon-angle-down"></b>
                                                    </a>
                        
                                                    <ul class="submenu">
                                                        <li>
                                                            <a href="tables.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Simple &amp; Dynamic
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="jqgrid.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                jqGrid plugin
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>-->

                        <!--                        <li>
                                                    <a href="#" class="dropdown-toggle">
                                                        <i class="icon-edit"></i>
                                                        <span class="menu-text"> Forms </span>
                        
                                                        <b class="arrow icon-angle-down"></b>
                                                    </a>
                        
                                                    <ul class="submenu">
                                                        <li>
                                                            <a href="form-elements.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Form Elements
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="form-wizard.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Wizard &amp; Validation
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="wysiwyg.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Wysiwyg &amp; Markdown
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="dropzone.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Dropzone File Upload
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>-->

                        <!--                        <li>
                                                    <a href="widgets.html">
                                                        <i class="icon-list-alt"></i>
                                                        <span class="menu-text"> Widgets </span>
                                                    </a>
                                                </li>-->

                        <!--                        <li>
                                                    <a href="calendar.html">
                                                        <i class="icon-calendar"></i>
                        
                                                        <span class="menu-text">
                                                            Calendar
                                                            <span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
                                                                <i class="icon-warning-sign red bigger-130"></i>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </li>-->

                        <!--                        <li>
                                                    <a href="gallery.html">
                                                        <i class="icon-picture"></i>
                                                        <span class="menu-text"> Gallery </span>
                                                    </a>
                                                </li>-->

                        <!--                        <li>
                                                    <a href="#" class="dropdown-toggle">
                                                        <i class="icon-tag"></i>
                                                        <span class="menu-text"> More Pages </span>
                        
                                                        <b class="arrow icon-angle-down"></b>
                                                    </a>
                        
                                                    <ul class="submenu">
                                                        <li>
                                                            <a href="profile.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                User Profile
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="inbox.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Inbox
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="pricing.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Pricing Tables
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="invoice.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Invoice
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="timeline.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Timeline
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="login.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Login &amp; Register
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>-->

                        <!--                        <li >
                                                    <a href="#" class="dropdown-toggle">
                                                        <i class="icon-file-alt"></i>
                        
                                                        <span class="menu-text">
                                                            Other Pages
                                                            <span class="badge badge-primary ">5</span>
                                                        </span>
                        
                                                        <b class="arrow icon-angle-down"></b>
                                                    </a>
                        
                                                    <ul class="submenu">
                                                        <li>
                                                            <a href="faq.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                FAQ
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="error-404.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Error 404
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="error-500.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Error 500
                                                            </a>
                                                        </li>
                        
                                                        <li>
                                                            <a href="grid.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Grid
                                                            </a>
                                                        </li>
                        
                                                        <li class="active">
                                                            <a href="blank.html">
                                                                <i class="icon-double-angle-right"></i>
                                                                Blank Page
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>-->
                        <li <?php if ($this->menuActive == "TypeController") echo "class='active open'"; ?>>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-cloud"></i>
                                <span class="menu-text"> Type Manager</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?php echo $this->createUrl('type/list'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List type
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->createUrl('type/create'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Create type
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('type/admin'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Manage type
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php if ($this->menuActive == "PermissionController") echo "class='active open'"; ?>>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-cloud"></i>
                                <span class="menu-text"> Permission Manager</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?php echo $this->createUrl('permission/ManagerPermission'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Manage Permission
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->createUrl('permission/AddAllAction'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Add All Permission
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php if ($this->menuActive == "UserController") echo "class='active open'"; ?>>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-user"></i>
                                <span class="menu-text"> User Manager</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?php echo $this->createUrl('user/list'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List Users
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->createUrl('user/create'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Create User
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('user/update'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Update User
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php if ($this->menuActive == "NoteController") echo "class='active open'"; ?>>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-film"></i>
                                <span class="menu-text"> Note Manager</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?php echo $this->createUrl('note/list'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List Notes
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->createUrl('note/usercreate'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Create Note
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('note/admin'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Manage Note
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li <?php if ($this->menuActive == "MenuController") echo "class='active open'"; ?>>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-cloud"></i>
                                <span class="menu-text"> Menu Manager</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="<?php echo $this->createUrl('menu/list'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List type
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->createUrl('menu/create'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Create type
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('menu/admin'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Manage type
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- /.nav-list -->

                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                    </div>

                    <script type="text/javascript">
                        try {
                            ace.settings.check('sidebar', 'collapsed')
                        } catch (e) {
                        }
                    </script>
                </div>

                <div class="main-content">
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>

                            <li>
                                <a href="#"><?php echo $controller = str_replace("Controller", "", $this->menuActive); ?></a>
                            </li>
                            <li class="active"><?php echo $controller . " " . str_replace("action", "", $this->action); ?></li>
                        </ul><!-- .breadcrumb -->

                        <div class="nav-search" id="nav-search">
                            <form class="form-search">
                                <span class="input-icon">
                                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                                    <i class="icon-search nav-search-icon"></i>
                                </span>
                            </form>
                        </div><!-- #nav-search -->
                    </div>
                    <?php echo $content; ?>

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



        <!-- <![endif]-->

        <!--[if !IE]> -->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='admin/assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
        <script type="text/javascript">
            window.jQuery || document.write("<script src='admin/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
        </script>
        <![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='admin/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="admin/assets/js/bootstrap.min.js"></script>
        <script src="admin/assets/js/typeahead-bs2.min.js"></script>

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->

        <script src="admin/assets/js/sexy-elements.min.js"></script>
        <script src="admin/assets/js/sexy.min.js"></script>

        <!-- inline scripts related to this page -->
    </body>

    <!-- Mirrored from 192.69.216.111/themes/preview/ace/blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 21 Nov 2013 17:37:01 GMT -->
</html>
