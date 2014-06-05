<nav class="navbar navbar-default custom" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <a class="navbar-brand" href="#">Thêm mới trang Landing</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="<?php echo $this->Router->baseUrl; ?>landing" class="btn btn-primary" title="Danh mục tin tức">Danh mục landing pages</a>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<div class='row'>
    <div class="col-md-12">
        <form role="form" method="POST" id="addForm">
            <table class="table table-striped">
                <tr>
                    <td class="with-medium">Tên danh mục <span class="text-danger">(*)</span></td>
                    <td>
                        <input onKeyDown="textCounter(this,'counter_title',40)" onKeyUp="textCounter(this,'counter_title',40)" name='title' type="text" class="form-control" id="title" placeholder="Nhập tên danh mục" value="<?php echo isset($category['title']) ? $category['title'] : '' ?>">
                        <div class="countText clearfix text-right"><span class="guide pull-left">Tiêu đề tin tức tối đa 40 ký tự</span> <span id="counter_title">0</span>/40</div>
                    </td>
                </tr>
                <tr>
                    <td>Chủ đề tin tức</td>
                    <td>
                        <select name='parent_id'  class="form-control">
                            <option value="">Hãy chọn...</option>
                            <?php
				            foreach($categories as $id => $title) {
                            if ($id == $category['id']) {
                            continue;
                            }
                            $selected = '';
                            if ($id == $category['parent_id']) {
                            $selected = 'selected';
                            }
                            echo "<option value='$id' $selected>$title</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mô tả</td>
                    <td>
                        <textarea onKeyDown="textCounter(this,'counter_description',200)" onKeyUp="textCounter(this,'counter_description',200)" name='description' class="form-control" id="description" placeholder="Nhập mô tả danh mục" ><?php echo isset($category['description']) ? $category['description'] : '' ?></textarea>
                        <div class="countText clearfix text-right"><span class="guide pull-left">Mô tả danh mục tin tức tối đa 200 ký tự</span> <span id="counter_description">0</span>/200</div>
                    </td>
                </tr>
                <tr>
                    <td>Bài viết mặc định</td>
                    <td>
                        <input onfocus="return openModal();" type="text" class="form-control" placeholder="Nhập mã bài viết"  name="featured_article" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="btn btn-primary">Gửi đi</button>
                        <a href="<?php echo $this->Router->baseUrl; ?>category" class="btn btn-default">Hủy bỏ</a>
                    </td>
                </tr>
            </table>
            <input type="hidden" name="landing" value = "1" />
        </form>
    </div>
</div>
<script type="text/javascript">

    function textCounter(e, t, n) {
        if (e.value.length > n) e.value = e.value.substring(0, n);
        else document.getElementById(t).innerHTML = e.value.length
    }
    $(document).ready(function(){
        $('#addForm').validate({
            errorPlacement: function(error, element){
                var err = element.parent('td');
                $(err).append(error);
            },
            onkeyup : false,
            rules : {
                title : {
                    required : true,
                    maxlength : 40
                },
                description : {
                    maxlength : 200
                }
            },
            messages : {
                title : {
                    required : "Tên server đang trống",
                    maxlength : "Tên server tối đa 40 ký tự"
                },
                description : {
                    maxlength : "Mô tả tối đa 200 ký tự"
                }
            }
        });

    });
</script>
<div class="modal fade" id="modal" data-ready="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Chọn một bài viết</h4>
            </div>
            <div class="modal-body" id="modal-body">
                 <div class="preload" style="text-align: center;">
                     <img src="<?php echo $this->Router->baseUrl; ?>shg_admin/images/preload.gif" alt="Đang nạp" />
                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                <button type="button" class="btn btn-primary">Chọn bài này</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
    var _base = "<?php echo $this->Router->baseUrl; ?>";
    function landingLoadData(p){
        $.ajax(
                url: _base + "landing/ajax",
                type: "GET",
                cache: false,
                success: function(s){
                    $("#modal-body").html(s);
                },
                error: function(){
                    $("#modal-body").html("Không tải được dữ liệu !");
                }
        );
    };
    function openModal(){
        $("#modal").modal("show");
        if($("#modal").attr("data-ready")  == false){
            landingLoadData(0);
        }
        return true;
    }
</script>
<script type="text/javascript">
    var _base = "<?php echo $this->Router->baseUrl; ?>";
    function landingSelect(id, title){
        $("#featured_article").val(id);
        $("#featured_display").val(title);
        $("#modal").modal("close");
    }
    
    function landingParseData(s){
        var _htm = "<table class='table' style='margin-bottom: 0px;' ><thead><th>ID</th><th>Tiêu đề</th></thead>",
            data = JSON.parse(s);

        for(var i = 0; i < data.length; i++){
            _data = data[i];
            _htm += "<tr style='cursor: pointer;' onclick = 'return landingSelect("+_data.id+", '"+_data.title+"');'><td>"+_data.id+"</td><td>"+_data.title+"</td></tr>";
        }
        _htm += "</table>";
        $("#modal-body").html(_htm);
        $("#modal").attr("data-ready","true");
    }
    function landingLoadData(p){
        $("#modal-body").html("<div style='text-align: center;'><img src='"+_base+"shg_admin/images/preload.gif' /></div>");
        $.ajax({
                url: _base + "landing/ajax?p="+p,
                type: "GET",
                cache: false,
                success: function(s){
                landingParseData(s);
        },
        error: function(){
            $("#modal-body").html("Không tải được dữ liệu !");
        }
        });
    };
    function openModal(){
        $("#modal").modal("show");
        if($("#modal").attr("data-ready")  == "false"){
            landingLoadData(0);
        }
        return true;
    }
</script>