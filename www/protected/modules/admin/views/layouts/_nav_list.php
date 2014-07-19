<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 7/19/14
 * Time: 9:35 AM
 * To change this template use File | Settings | File Templates.
 */
?>
<ul class="nav nav-list">
<li>
    <a href="index.html">
        <i class="icon-dashboard"></i>
        <span class="menu-text"> Dashboard </span>
    </a>
</li>

<li>
    <a href="typography.html">
        <i class="icon-text-width"></i>
        <span class="menu-text"> Typography </span>
    </a>
</li>

<li <?php if ($this->menuActive == "CourseController") echo "class='active open'"; ?>>
    <a href="#" class="dropdown-toggle">
        <i class="icon-desktop"></i>
        <span class="menu-text"> Quản lý khóa học</span>

        <b class="arrow icon-angle-down"></b>
    </a>

    <ul class="submenu">
        <li <?php if($this->getAction()->getId() =='index') echo "class='active'"?>>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/course/index">
                <i class="icon-double-angle-right"></i>
                Danh sách khóa học
            </a>
        </li>

        <li <?php if($this->getAction()->getId() =='create') echo "class='active'"?>>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/course/create">
                <i class="icon-double-angle-right"></i>
                Tạo khóa học mới
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
</li>

<li <?php if ($this->menuActive == "UserController") echo "class='active open'"; ?>>
    <a href="#" class="dropdown-toggle">
        <i class="icon-user"></i>
        <span class="menu-text"> User Manager</span>

        <b class="arrow icon-angle-down"></b>
    </a>

    <ul class="submenu">
        <li <?php if($this->getAction()->getId() =='index') echo "class='active'"?>>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/user/index">
                <i class="icon-double-angle-right"></i>
                List All User Normal
            </a>
        </li>

        <li>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/user/admin">
                <i class="icon-double-angle-right"></i>
                List All User Ajax
            </a>
        </li>

        <li>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/user/create">
                <i class="icon-double-angle-right"></i>
                Create User
            </a>
        </li>

        <li>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/user/admin" class="dropdown-toggle">
                <i class="icon-double-angle-right"></i>
                List User Ajax
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
</li>

<li>
    <a href="#" class="dropdown-toggle">
        <i class="icon-list"></i>
        <span class="menu-text"> Sản phẩm </span>

        <b class="arrow icon-angle-down"></b>
    </a>

    <ul class="submenu">
        <li>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/product/list">
                <i class="icon-double-angle-right"></i>
                Danh sách list sản phẩm
            </a>
        </li>

        <li>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/product/admin">
                <i class="icon-double-angle-right"></i>
                Danh sách admin sản phẩm
            </a>
        </li>

        <li>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/product/create">
                <i class="icon-double-angle-right"></i>
                Thêm sản phẩm mới
            </a>
        </li>
    </ul>
</li>

<li <?php if ($this->menuActive == "CategoryController") echo "class='active open'"; ?>>
    <a href="#" class="dropdown-toggle">
        <i class="icon-list-alt"></i>
        <span class="menu-text"> Danh mục </span>

        <b class="arrow icon-angle-down"></b>
    </a>

    <ul class="submenu">
        <li <?php if($this->getAction()->getId() =='index') echo "class='active'"?>>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/category/index">
                <i class="icon-double-angle-right"></i>
                Danh sách danh mục
            </a>
        </li>

        <li <?php if($this->getAction()->getId() =='admin') echo "class='active'"?>>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/category/admin">
                <i class="icon-double-angle-right"></i>
                Danh sách admin danh mục
            </a>
        </li>


        <li <?php if($this->getAction()->getId() =='create') echo "class='active'"?>>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/category/create">
                <i class="icon-double-angle-right"></i>
                Thêm danh mục mới
            </a>
        </li>
    </ul>
</li>

<li <?php if ($this->menuActive == "NewsController") echo "class='active open'"; ?>>
    <a href="#" class="dropdown-toggle">
        <i class="icon-list"></i>
        <span class="menu-text"> Tin tức </span>

        <b class="arrow icon-angle-down"></b>
    </a>

    <ul class="submenu">
        <li <?php if($this->getAction()->getId() =='index') echo "class='active'"?>>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/news/index">
                <i class="icon-double-angle-right"></i>
                Danh sách tin tức
            </a>
        </li>

        <li <?php if($this->getAction()->getId() =='admin') echo "class='active'"?>>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/news/admin">
                <i class="icon-double-angle-right"></i>
                Danh sách admin tin tức
            </a>
        </li>

        <li <?php if($this->getAction()->getId() =='create') echo "class='active'"?>>
            <a href="<?php echo Yii::app()->request->baseUrl;?>/admin/news/create">
                <i class="icon-double-angle-right"></i>
                Thêm tin tức mới
            </a>
        </li>
    </ul>
</li>

<li>
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

        <li>
            <a href="blank.html">
                <i class="icon-double-angle-right"></i>
                Blank Page
            </a>
        </li>
    </ul>
</li>
</ul><!-- /.nav-list -->