<!DOCTYPE html>
<html lang="en">
<?php echo $this->renderPartial('/layouts/_header');?>
<!-- Mirrored from 192.69.216.111/themes/preview/ace/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 21 Nov 2013 17:35:39 GMT -->
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
    if($this->menuActive != 'ErrorController') {
        echo $this->renderPartial('/layouts/_page_header');
    }
    ?>
    <?php echo $content; ?>
</div><!-- /.main-content -->
<?php echo $this->renderPartial('/layouts/_ace_settings');?>
</div><!-- /.main-container-inner -->
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->
<?php echo $this->renderPartial('/layouts/_scripts');?>
</body>
<!-- Mirrored from 192.69.216.111/themes/preview/ace/index.html by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 21 Nov 2013 17:36:04 GMT -->
</html>
