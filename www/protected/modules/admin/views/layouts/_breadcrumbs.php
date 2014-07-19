<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/19/14
 * Time: 9:26 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>

    <ul class="breadcrumb">
        <li>
            <i class="icon-dashboard home-icon"></i>
            <a href="admin">Bảng điều khiển</a>
        </li>
        <li class="">
            <a href="admin/categories"><?php echo $this->menuActive;?></a>
        </li>
        <li class="active"><a href="admin/categories/list/21"><?php echo CHtml::encode($this->pageTitle); ?></a></li>
    </ul>

    <div class="nav-search" id="nav-search">
        <form class="form-search">
			<span class="input-icon">
				<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input"
                       autocomplete="off"/>
				<i class="icon-search nav-search-icon"></i>
			</span>
        </form>
    </div>
    <!-- #nav-search -->
</div>